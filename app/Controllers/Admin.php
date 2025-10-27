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

        // Authentication & Authorization
        if (!$user)
            return redirect()->to('/login');
        if ($user['role'] !== 'admin')
            return view('errors/html/access_denied');

        $userModel = new UserModel();
        $quizModel = new QuizTitleModel();

        // Stats
        $data['total_users'] = $userModel->where('role !=', 'admin')->countAllResults();
        $data['total_quizzes'] = $quizModel->countAllResults();
        $data['recent_users'] = $userModel->where('role !=', 'admin')->orderBy('created_at', 'DESC')->limit(5)->find();
        $data['recent_quizzes'] = $quizModel
            ->select('quiz_titles.*, quiz_subjects.name as subject_name')
            ->join('quiz_subjects', 'quiz_subjects.id = quiz_titles.subject_id', 'left')
            ->orderBy('quiz_titles.created_at', 'DESC')
            ->limit(5)
            ->find();

        // Button URLs
        $data['create_quiz_url'] = base_url('admin/quiz/create');
        $data['manage_users_url'] = base_url('admin/users');
        $data['manage_quizzes_url'] = base_url('admin/quizzes');

        return view('admin/dashboard', $data);
    }

    public function quizzes()
    {
        $quizModel = new \App\Models\QuizTitleModel();

        $data['quizzes'] = $quizModel
            ->select('quiz_titles.*, quiz_subjects.name as subject_name')
            ->join('quiz_subjects', 'quiz_subjects.id = quiz_titles.subject_id', 'left')
            ->orderBy('quiz_titles.created_at', 'DESC')
            ->paginate(3, 'default'); // ✅ 9 cards per page (you had a mismatch in comment)

        $data['pager'] = $quizModel->pager;

        return view('admin/quizzes', $data);
    }




    public function users()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel
            ->where('role !=', 'admin')
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        $data['pager'] = $userModel->pager;

        return view('admin/users', $data);
    }
}
