<?php

namespace App\Models;
use CodeIgniter\Model;

class QuizTitleModel extends Model
{
    protected $table = 'quiz_titles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['subject_id', 'title', 'created_at'];
    protected $useTimestamps = false;
}
