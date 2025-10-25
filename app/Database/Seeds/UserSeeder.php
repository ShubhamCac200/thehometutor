<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'full_name' => 'Admin',
                'email'     => 'admin@thehometutor.com',
                'mobile'    => '9999999999',
                'password'  => password_hash('admin123', PASSWORD_DEFAULT),
                'role'      => 'admin',
            ],
            [
                'full_name' => 'Rohit Sharma',
                'email'     => 'rohit@example.com',
                'mobile'    => '8888888888',
                'password'  => password_hash('123456', PASSWORD_DEFAULT),
                'role'      => 'user',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
