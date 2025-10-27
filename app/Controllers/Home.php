<?php

namespace App\Controllers;

use App\Models\QuizTitleModel;

class Home extends BaseController
{
    public function index()
    {
        $quizModel = new QuizTitleModel();

        // ✅ Paginate quizzes (6 per page)
        $data['quizzes'] = $quizModel
            ->select('quiz_titles.*, quiz_subjects.name as subject_name')
            ->join('quiz_subjects', 'quiz_subjects.id = quiz_titles.subject_id', 'left')
            ->orderBy('quiz_titles.created_at', 'DESC')
            ->paginate(6, 'default'); 

        // ✅ Add pager
        $data['pager'] = $quizModel->pager;

        return view('home', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
