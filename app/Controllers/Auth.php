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
}
