<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user || $user['role'] !== 'admin') {
            return redirect()->to('/login');
        }

        return view('admin/dashboard', ['user' => $user]);
    }
}
