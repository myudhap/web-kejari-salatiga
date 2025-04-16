<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwalSidangTableMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'terdakwa' => [
                'type' => 'TEXT',
            ],
            'jpu' => [
                'type' => 'TEXT',
            ],
            'no_perkara' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'agenda' => [
                'type' => 'TEXT',
            ],
            'tempat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jadwal_sidang');
    }

    public function down()
    {
        $this->forge->dropTable("jadwal_sidang");
    }
}
