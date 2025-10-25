<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SubjectModel;
use App\Models\QuizTitleModel;
use App\Models\QuizModel;

class QuizController extends BaseController
{
    public function index()
    {
        $quizTitleModel = new QuizTitleModel();
        $subjectModel = new SubjectModel();

        // Fetch all quiz titles with subject name
        $quizzes = $quizTitleModel
            ->select('quiz_titles.*, subjects.name as subject_name')
            ->join('subjects', 'subjects.id = quiz_titles.subject_id', 'left')
            ->orderBy('quiz_titles.created_at', 'DESC')
            ->findAll();

        return view('admin/quiz/index', [
            'quizzes' => $quizzes
        ]);
    }


    public function create()
    {
        $subjectModel = new SubjectModel();
        $subjects = $subjectModel->findAll();

        return view('admin/quiz/create', [
            'subjects' => $subjects
        ]);
    }

    public function store()
    {
        $quizTitleModel = new QuizTitleModel();
        $quizModel = new QuizModel();

        $title = $this->request->getPost('title');
        $subject_id = $this->request->getPost('subject_id');
        $questions = json_decode($this->request->getPost('questions'), true);

        if (!$title || !$subject_id || empty($questions)) {
            return $this->response->setJSON(['success' => false, 'message' => 'All fields are required']);
        }

        // 1️⃣ Create quiz title
        $quiz_title_id = $quizTitleModel->insert([
            'title' => $title,
            'subject_id' => $subject_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (!$quiz_title_id) {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to create quiz title']);
        }

        // 2️⃣ Insert all questions
        foreach ($questions as $q) {
            $quizModel->insert([
                'quiz_title_id' => $quiz_title_id,
                'question' => $q['question'],
                'option_a' => $q['option_a'],
                'option_b' => $q['option_b'],
                'option_c' => $q['option_c'],
                'option_d' => $q['option_d'],
                'correct_option' => $q['correct_option'],
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        return $this->response->setJSON(['success' => true, 'message' => 'Quiz saved successfully']);
    }
    public function view($id)
    {
        $quizTitleModel = new QuizTitleModel();
        $quizModel = new QuizModel();

        $quizTitle = $quizTitleModel->find($id);

        if (!$quizTitle) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Quiz not found');
        }

        $questions = $quizModel->where('quiz_title_id', $id)->findAll();

        return view('admin/quiz/view', [
            'quizTitle' => $quizTitle,
            'questions' => $questions
        ]);
    }
    // Submit quiz answers
    public function submit($quizTitleId)
    {
        $quizModel = new QuizModel();
        $questions = $quizModel->where('quiz_title_id', $quizTitleId)->findAll();

        $score = 0;
        $answers = [];
        foreach ($questions as $q) {
            $ans = $this->request->getPost('question_' . $q['id']);
            $answers[$q['id']] = $ans;
            if ($ans && $ans === $q['correct_option']) {
                $score++;
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'score' => $score,
            'total' => count($questions),
            'answers' => $answers,
            'correct' => array_column($questions, 'correct_option', 'id')
        ]);
    }

}
