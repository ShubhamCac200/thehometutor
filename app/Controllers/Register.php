<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('register');
    }

    public function save()
    {
        helper(['form']);

        $rules = [
            'full_name' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Please enter your full name.',
                    'min_length' => 'Full name must be at least 3 characters long.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Please enter your email address.',
                    'valid_email' => 'Please enter a valid email address.',
                    'is_unique' => 'This email is already registered. Please use another one.'
                ]
            ],
            'mobile' => [
                'rules' => 'required|min_length[10]|max_length[15]|is_unique[users.mobile]',
                'errors' => [
                    'required' => 'Please enter your mobile number.',
                    'min_length' => 'Mobile number must be at least 10 digits long.',
                    'is_unique' => 'This mobile number is already registered.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[255]',
                'errors' => [
                    'required' => 'Please enter a password.',
                    'min_length' => 'Password must be at least 6 characters long.'
                ]
            ],
            'cpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Please confirm your password.',
                    'matches' => 'Passwords do not match. Please try again.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return view('register', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new \App\Models\UserModel();

        $userData = [
            'full_name' => $this->request->getVar('full_name'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => 'user'
        ];

        $userModel->save($userData);

        session()->setFlashdata('success', '🎉 Registration successful! You can now log in.');
        return redirect()->to('/login');
    }

}
