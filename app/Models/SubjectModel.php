<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table = 'quiz_subjects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'created_at'];
    public $timestamps = false;
}
