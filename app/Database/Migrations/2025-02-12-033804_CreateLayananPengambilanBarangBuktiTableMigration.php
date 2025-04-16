<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLayananPengambilanBarangBuktiTableMigration extends Migration
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
            'nama_pemohon' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_terpidana' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nomor_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanda_pengenal' => [
                'type' => 'TEXT',
            ],
            'perkara' => [
                'type' => 'TEXT',
            ],
            'barang_bukti' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'surat_kuasa' => [
                'type' => 'TEXT',
            ],
            'bukti_kepemilikan' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'ENUM("on_process", "done")',
                'default' => 'on_process',
                'null' => FALSE
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('layanan_pengambilan_barang_bukti');
    }

    public function down()
    {
        $this->forge->dropTable("layanan_pengambilan_barang_bukti");
    }
}
