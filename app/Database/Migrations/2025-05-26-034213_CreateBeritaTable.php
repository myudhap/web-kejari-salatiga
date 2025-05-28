<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBeritaTable extends Migration
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
            'user_id' => [
                'type' 		 => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'judul' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'isi' => [
                'type' => 'TEXT',
            ],
            'gambar' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
		$this->forge->dropTable('berita');
    }
}
