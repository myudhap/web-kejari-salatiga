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
            'nama_petugas' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'tipe_pelayanan' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'tujuan_tamu' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
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
            ],
            'email' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'plat_kendaraan' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 20,
            ],
            'jenis_kelamin' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 15,
            ],
            'tempat_lahir' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_lahir' => [
                'type' 		 => 'DATE'
            ],
            'alamat' => [
                'type' 		 => 'TEXT'
            ],
            'foto' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
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
