<?php

namespace App\Controllers;

use App\Models\QuizTitleModel;

class User extends BaseController
{
    public function index()
    {
        $session = session();
        $user = $session->get('user');

        // ✅ Check if user is logged in and has correct role
        if (!$user || $user['role'] !== 'user') {
            return redirect()->to('/login');
        }

        $quizModel = new QuizTitleModel();

        // ✅ Paginate quizzes (6 per page)
        $data['quizzes'] = $quizModel
            ->select('quiz_titles.*, quiz_subjects.name as subject_name')
            ->join('quiz_subjects', 'quiz_subjects.id = quiz_titles.subject_id', 'left')
            ->orderBy('quiz_titles.created_at', 'DESC')
            ->paginate(9, 'default');

        // ✅ Add pager
        $data['pager'] = $quizModel->pager;

        // ✅ Pass all data to the view
        $data['user'] = $user;

        return view('user/dashboard', $data);
    }

}
