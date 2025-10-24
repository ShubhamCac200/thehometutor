<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/login'); // Not logged in
        }

        if ($user['role'] !== 'admin') {
            return view('errors/html/access_denied'); // Access denied page
        }

        $model = new UserModel();
        $data['total_users'] = $model->where('role !=', 'admin')->countAllResults();
        // Paginate users, 20 per page
        // Paginate non-admin users, 20 per page
        $data['users'] = $model
            ->where('role !=', 'admin')
            ->orderBy('created_at', 'DESC')
            ->paginate(50);
        $data['pager'] = $model->pager;
        return view('admin/dashboard', $data);
    }

}
