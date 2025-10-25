<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuizSubjectsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Static GK'],
            ['name' => 'History'],
            ['name' => 'Geography'],
            ['name' => 'Biology'],
            ['name' => 'Physics'],
            ['name' => 'Chemistry'],
            ['name' => 'Indian Polity'],
            ['name' => 'Current Affairs'],
            ['name' => 'Computer Science'],
            ['name' => 'Economics'],
        ];

        $this->db->table('quiz_subjects')->insertBatch($data);
    }
}
