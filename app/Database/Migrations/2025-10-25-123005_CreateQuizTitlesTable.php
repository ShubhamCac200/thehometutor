<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuizTitlesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'subject_id'    => ['type' => 'INT', 'unsigned' => true],
            'title'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('subject_id', 'subjects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('quiz_titles');
    }

    public function down()
    {
        $this->forge->dropTable('quiz_titles');
    }
}
