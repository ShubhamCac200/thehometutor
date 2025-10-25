<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use Config\Services;

class PasswordReset extends BaseController
{
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function sendOtp()
    {
        $email = trim($this->request->getPost('email'));
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No account found with this email address.');
        }

        // Generate OTP
        $otp = rand(100000, 999999);
        $expires = Time::now()->addMinutes(5)->getTimestamp();

        // Store in session
        session()->set([
            'otp_email' => $email,
            'otp_code' => $otp,
            'otp_expires' => $expires,
        ]);

        // Send OTP email
        $emailService = Services::email();
        $emailService->setTo($email);
        $emailService->setFrom('noreply@thehometutor.com', 'The Home Tutor');
        $emailService->setSubject('Password Reset OTP');
        $emailService->setMessage("
            <h3>Password Reset Request</h3>
            <p>Your OTP to reset your password is:</p>
            <h2>$otp</h2>
            <p>This code will expire in 5 minutes.</p>
        ");
        $emailService->send();

        return redirect()->to('/verify-otp')->with('success', 'OTP sent to your email.');
    }

    public function verifyOtpForm()
    {
        return view('auth/verify_otp');
    }

    public function verifyOtp()
    {
        $enteredOtp = $this->request->getPost('otp');
        $storedOtp = session()->get('otp_code');
        $expiresAt = session()->get('otp_expires');

        if (!$storedOtp) {
            return redirect()->to('/forgot-password')->with('error', 'Session expired. Try again.');
        }

        if (time() > $expiresAt) {
            return redirect()->to('/forgot-password')->with('error', 'OTP expired. Request a new one.');
        }

        if ($enteredOtp != $storedOtp) {
            return redirect()->back()->with('error', 'Invalid OTP. Try again.');
        }

        // OTP verified
        session()->set('otp_verified', true);
        return redirect()->to('/reset-password')->with('success', 'OTP verified. You can reset your password.');
    }

    public function resetPasswordForm()
    {
        if (!session()->get('otp_verified')) {
            return redirect()->to('/forgot-password')->with('error', 'Unauthorized access.');
        }
        return view('auth/reset_password');
    }

    public function resetPassword()
    {
        if (!session()->get('otp_verified')) {
            return redirect()->to('/forgot-password')->with('error', 'Unauthorized access.');
        }

        $password = $this->request->getPost('password');
        $confirm = $this->request->getPost('confirm_password');

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        $email = session()->get('otp_email');
        $userModel = new UserModel();
        $userModel->where('email', $email)->set(['password' => password_hash($password, PASSWORD_DEFAULT)])->update();

        // Clear OTP session data
        session()->remove(['otp_email', 'otp_code', 'otp_expires', 'otp_verified']);

        return redirect()->to('/login')->with('success', 'Password reset successfully! You can log in now.');
    }
}
