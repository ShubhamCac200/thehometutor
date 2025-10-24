<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user || $user['role'] !== 'user') {
            return redirect()->to('/login');
        }

        return view('user/dashboard', ['user' => $user]);
    }
}
