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
            ->paginate(9, 'default');

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
    public function contactSend()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        // Initialize email service
        $emailService = \Config\Services::email();

        $emailService->setTo('goswamishubham66@gmail.com');
        $emailService->setFrom('noreply@thehometutor.com', 'The Home Tutor');
        $emailService->setSubject('📩 New Contact Form Submission');
        $emailService->setMessage("
            <h3>New Contact Message Received</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
            <hr>
            <p style='color:gray'>This message was sent from the Contact page on <b>The Home Tutor</b>.</p>
        ");

        if ($emailService->send()) {
            return redirect()->to('/contact')->with('success', '✅ Your message has been sent successfully!');
        } else {
            $data = $emailService->printDebugger(['headers']);
            log_message('error', print_r($data, true));
            return redirect()->to('/contact')->with('error', '❌ Failed to send your message. Please try again later.');
        }
    }
}
