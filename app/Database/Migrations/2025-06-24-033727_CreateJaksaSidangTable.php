<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJaksaSidangTable extends Migration
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
            'jaksa_id' => [
                'type' 		 => 'INT',
                'constraint' => 5,
            ],
            'jadwal_sidang_id' => [
                'type' 		 => 'INT',
                'constraint' => 5,
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jaksa_sidang');
    }

    public function down()
    {
        $this->forge->dropTable('jaksa_sidang');
    }
}
