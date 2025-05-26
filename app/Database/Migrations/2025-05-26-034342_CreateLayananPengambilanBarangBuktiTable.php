<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLayananPengambilanBarangBuktiTable extends Migration
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
            'nama_pemohon' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_terpidana' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat' => [
                'type' 		 => 'TEXT',
            ],
            'pekerjaan' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'nomor_telepon' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 20,
            ],
            'tanda_pengenal' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'perkara' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'barang_bukti' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'surat_kuasa' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'bukti_kepemilikan' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 255,
            ],
            'nomor_registrasi' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 30,
            ],
            'status' => [
                'type' 		 => 'ENUM',
                'constraint' => ['waiting', 'on_process', 'done'],
                'default'    => 'waiting'
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('layanan_pengambilan_barang_bukti');
    }

    public function down()
    {
        $this->forge->dropTable('layanan_pengambilan_barang_bukti');
    }
}
