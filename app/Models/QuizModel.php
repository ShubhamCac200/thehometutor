<?php

namespace App\Models;
use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'mcq_questions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['quiz_title_id', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_option', 'created_at'];
    protected $useTimestamps = false;
}
