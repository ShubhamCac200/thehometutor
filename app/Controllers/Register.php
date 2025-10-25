<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        helper(['form']);
        //echo view('layouts/header');
        echo view('register');
        //echo view('layouts/footer');
    }

    public function save()
    {
        helper(['form']);

        $rules = [
            'full_name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'mobile' => 'required|min_length[10]|max_length[15]',
            'password' => 'required|min_length[6]|max_length[255]',
            'cpassword' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return view('register', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new UserModel();

        $userData = [
            'full_name' => $this->request->getVar('full_name'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => 'user'
        ];

        $userModel->save($userData);

        session()->setFlashdata('success', 'Registration successful! You can now login.');
        return redirect()->to('/login');
    }
}
