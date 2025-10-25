<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMcqQuestionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'quiz_title_id'   => ['type' => 'INT', 'unsigned' => true],
            'question'        => ['type' => 'TEXT'],
            'option_a'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'option_b'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'option_c'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'option_d'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'correct_option'  => ['type' => 'CHAR', 'constraint' => 1],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('quiz_title_id', 'quiz_titles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mcq_questions');
    }

    public function down()
    {
        $this->forge->dropTable('mcq_questions');
    }
}
