<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use Config\Services;

class PasswordReset extends BaseController
{
    /**
     * Step 1: Show forgot password form
     */
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    /**
     * Step 2: Send OTP to user email
     */
    public function sendOtp()
    {
        $email = trim($this->request->getPost('email'));

        // Basic email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Please enter a valid email address.');
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No account found with this email address.');
        }

        // Generate OTP and expiry
        $otp = rand(100000, 999999);
        $expires = Time::now()->addMinutes(5)->getTimestamp();

        // Store OTP in session
        session()->set([
            'otp_email'   => $email,
            'otp_code'    => $otp,
            'otp_expires' => $expires,
        ]);

        // Configure email
        $emailService = Services::email();

        $emailService->setTo($email);
        $emailService->setFrom('noreply@thehometutor.com', 'The Home Tutor');
        $emailService->setSubject('Password Reset OTP');
        $emailService->setMessage("
            <h2>Password Reset Request</h2>
            <p>Your OTP to reset your password is:</p>
            <h1 style='color:#2E86C1;'>$otp</h1>
            <p>This code will expire in <b>5 minutes</b>.</p>
            <p>If you didn’t request this, please ignore this email.</p>
        ");

        // Send email and check result
        if (!$emailService->send()) {
            // Log the error
            log_message('error', 'Email sending failed: ' . $emailService->printDebugger(['headers']));
            return redirect()->back()->with('error', 'Failed to send OTP. Please try again later.');
        }

        return redirect()->to('/verify-otp')->with('success', 'OTP sent successfully to your registered email.');
    }

    /**
     * Step 3: Show OTP verification form
     */
    public function verifyOtpForm()
    {
        return view('auth/verify_otp');
    }

    /**
     * Step 4: Verify OTP submitted by user
     */
    public function verifyOtp()
    {
        $enteredOtp = trim($this->request->getPost('otp'));
        $storedOtp  = session()->get('otp_code');
        $expiresAt  = session()->get('otp_expires');

        if (!$storedOtp) {
            return redirect()->to('/forgot-password')->with('error', 'Session expired. Please request a new OTP.');
        }

        if (time() > $expiresAt) {
            session()->remove(['otp_email', 'otp_code', 'otp_expires']);
            return redirect()->to('/forgot-password')->with('error', 'OTP expired. Please request a new one.');
        }

        if ($enteredOtp != $storedOtp) {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }

        // OTP verified
        session()->set('otp_verified', true);
        return redirect()->to('/reset-password')->with('success', 'OTP verified! You can now reset your password.');
    }

    /**
     * Step 5: Show reset password form
     */
    public function resetPasswordForm()
    {
        if (!session()->get('otp_verified')) {
            return redirect()->to('/forgot-password')->with('error', 'Unauthorized access.');
        }

        return view('auth/reset_password');
    }

    /**
     * Step 6: Handle password reset submission
     */
    public function resetPassword()
    {
        if (!session()->get('otp_verified')) {
            return redirect()->to('/forgot-password')->with('error', 'Unauthorized access.');
        }

        $password = trim($this->request->getPost('password'));
        $confirm  = trim($this->request->getPost('confirm_password'));

        if (strlen($password) < 6) {
            return redirect()->back()->with('error', 'Password must be at least 6 characters long.');
        }

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        $email = session()->get('otp_email');
        $userModel = new UserModel();

        // Update password securely
        $userModel->where('email', $email)->set([
            'password'   => password_hash($password, PASSWORD_DEFAULT),
            'updated_at' => Time::now()
        ])->update();

        // Clear OTP session data
        session()->remove(['otp_email', 'otp_code', 'otp_expires', 'otp_verified']);

        return redirect()->to('/login')->with('success', 'Password reset successfully! You can log in now.');
    }
}
