<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    // Add all fields that you want to insert/update
    protected $allowedFields = [
        'full_name',
        'email',
        'mobile',
        'password',
        'role',
        'reset_token',
        'reset_expires',
        'last_login_ip',
        'last_login_at',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true; // automatically manage created_at and updated_at
}
