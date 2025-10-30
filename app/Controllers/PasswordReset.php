<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use Config\Services;

class PasswordReset extends BaseController
{
    /** Step 1: Show forgot password form */
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    /** Step 2: Send OTP to user email */
    public function sendOtp()
    {
        $email = trim($this->request->getPost('email'));

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Please enter a valid email address.');
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No account found with this email address.');
        }

        // Generate a 4-digit OTP and set expiry (5 mins)
        $otp = rand(1000, 9999);
        $expires = Time::now()->addMinutes(5);

        // Store OTP and expiry in DB
        $userModel->update($user['id'], [
            'reset_token'   => $otp,
            'reset_expires' => $expires
        ]);

        // Configure and send OTP email
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

        if (!$emailService->send()) {
            log_message('error', 'Email sending failed: ' . $emailService->printDebugger(['headers']));
            return redirect()->back()->with('error', 'Failed to send OTP. Please try again later.');
        }

        // Save email in session just for verification step
        session()->set('otp_email', $email);

        return redirect()->to('/verify-otp')->with('success', 'OTP sent successfully to your registered email.');
    }

    /** Step 3: Show OTP verification form */
    public function verifyOtpForm()
    {
        return view('auth/verify_otp');
    }

    /** Step 4: Verify OTP */
    public function verifyOtp()
    {
        $enteredOtp = trim($this->request->getPost('otp'));
        $email = session()->get('otp_email');

        if (!$email) {
            return redirect()->to('/forgot-password')->with('error', 'Session expired. Please request a new OTP.');
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user || empty($user['reset_token'])) {
            return redirect()->to('/forgot-password')->with('error', 'Invalid request. Please try again.');
        }

        // Check OTP validity
        if ($enteredOtp != $user['reset_token']) {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }

        // Check if expired
        if (Time::now()->isAfter($user['reset_expires'])) {
            $userModel->update($user['id'], ['reset_token' => null, 'reset_expires' => null]);
            return redirect()->to('/forgot-password')->with('error', 'OTP expired. Please request a new one.');
        }

        // OTP verified → allow password reset
        session()->set('otp_verified', true);

        return redirect()->to('/reset-password')->with('success', 'OTP verified! You can now reset your password.');
    }

    /** Step 5: Show reset password form */
    public function resetPasswordForm()
    {
        if (!session()->get('otp_verified')) {
            return redirect()->to('/forgot-password')->with('error', 'Unauthorized access.');
        }

        return view('auth/reset_password');
    }

    /** Step 6: Handle password reset */
    public function resetPassword()
    {
        if (!session()->get('otp_verified')) {
            return redirect()->to('/forgot-password')->with('error', 'Unauthorized access.');
        }

        $password = trim($this->request->getPost('password'));
        $confirm  = trim($this->request->getPost('confirm_password'));
        $email    = session()->get('otp_email');

        if (strlen($password) < 6) {
            return redirect()->back()->with('error', 'Password must be at least 6 characters long.');
        }

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Invalid request.');
        }

        // Update password securely
        $userModel->update($user['id'], [
            'password'      => password_hash($password, PASSWORD_DEFAULT),
            'reset_token'   => null,
            'reset_expires' => null,
            'updated_at'    => Time::now()
        ]);

        // Clear all session data related to OTP
        session()->remove(['otp_email', 'otp_verified']);

        return redirect()->to('/login')->with('success', 'Password reset successfully! You can now log in.');
    }
}
