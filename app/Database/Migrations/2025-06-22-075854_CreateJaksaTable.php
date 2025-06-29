<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJaksaTable extends Migration
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
            'nama' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'nip' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jaksa');
    }

    public function down()
    {
        $this->forge->dropTable('jaksa');
    }
}
