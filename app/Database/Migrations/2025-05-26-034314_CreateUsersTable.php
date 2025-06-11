<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'name' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'role_id' => [
                'type' 	     => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
