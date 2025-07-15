<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuTamuTable extends Migration
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
            'layanan_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'nama_petugas' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'tipe_identitas' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 15,
            ],
            'nomor_identitas' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_hp' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 25,
                'null'      => true,
            ],
            'plat_kendaraan' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 20,
                'null'      => true,
            ],
            'jenis_kelamin' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 15,
            ],
            'tempat_lahir' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
                'null'      => true,
            ],
            'tanggal_lahir' => [
                'type' 		 => 'DATE',
                'null'      => true,
            ],
            'alamat' => [
                'type' 		 => 'TEXT',
                'null'      => true,
            ],
            'foto_diri' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
                'null'      => true,
            ],
            'foto_identitas' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
                'null'      => true,
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('buku_tamu');
    }

    public function down()
    {
        $this->forge->dropTable('buku_tamu');
    }
}
