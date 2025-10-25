<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function doLogin()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set('user', $user);
            $session->setFlashdata('success', 'Successfully logged in!');
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin');
            } else {
                return redirect()->to('/user');
            }
        }

        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
     public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function processForgotPassword()
    {
        $email = $this->request->getPost('email');
        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No user found with that email address.');
        }

        // Generate a reset token
        $token = bin2hex(random_bytes(16));

        // Store the token and expiry in database (you’ll need these columns)
        $model->update($user['id'], [
            'reset_token' => $token,
            'reset_expires' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ]);

        // Normally, you’d send an email here
        // For now, just flash the link for demo
        $resetLink = base_url('/reset-password/' . $token);

        return redirect()->back()->with('success', 'Password reset link: ' . $resetLink);
    }
}
