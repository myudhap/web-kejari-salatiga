<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBukuTamu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                 => ['type' => 'INT', 'auto_increment' => true],
            'nama_petugas'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'tipe_pelayanan'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'tujuan_tamu'       => ['type' => 'TEXT', 'null' => true],
            'data_pribadi'      => ['type' => 'TEXT', 'null' => true],
            'tipe_identitas'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'nomor_identitas'   => ['type' => 'VARCHAR', 'constraint' => 100],
            'nama'              => ['type' => 'VARCHAR', 'constraint' => 100],
            'no_hp'             => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'email'             => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'plat_kendaraan'    => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'jenis_kelamin'     => ['type' => 'VARCHAR', 'constraint' => 10],
            'tempat_lahir'      => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'tanggal_lahir'     => ['type' => 'DATE', 'null' => true],
            'alamat'            => ['type' => 'TEXT', 'null' => true],
            'foto'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'        => ['type' => 'DATETIME', 'default' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('buku_tamu');
    }

    public function down()
    {
        $this->forge->dropTable('buku_tamu');
    }
}
