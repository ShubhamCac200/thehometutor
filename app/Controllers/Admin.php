<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\QuizTitleModel;

class Admin extends BaseController
{
    public function index()
    {
        $session = session();
        $user = $session->get('user');

        // Check if user is logged in
        if (!$user) {
            return redirect()->to('/login');
        }

        // Check if user is admin
        if ($user['role'] !== 'admin') {
            return view('errors/html/access_denied');
        }

        // Load models
        $userModel = new UserModel();
        $quizTitleModel = new QuizTitleModel();

        // 🧮 Total users (non-admin)
        $data['total_users'] = $userModel->where('role !=', 'admin')->countAllResults();

        // 📋 Paginate non-admin users
        $data['users'] = $userModel
            ->where('role !=', 'admin')
            ->orderBy('created_at', 'DESC')
            ->paginate(50);
        $data['pager'] = $userModel->pager;

        // 🧠 Fetch all quizzes with subject name
        $data['quizzes'] = $quizTitleModel
            ->select('quiz_titles.*, quiz_subjects.name as subject_name') // <-- correct table
            ->join('quiz_subjects', 'quiz_subjects.id = quiz_titles.subject_id', 'left') // <-- correct table
            ->orderBy('quiz_titles.created_at', 'DESC')
            ->findAll();

        // ✅ Load admin dashboard
        return view('admin/dashboard', $data);
    }
}
