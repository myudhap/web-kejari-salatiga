<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JadwalSidangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => '1',
            'terdakwa' => 'Ayu Arista Zahara Binti Agus Budi Santoso',
            'jpu' => 'Sutan Takdir',
            'no_perkara' => '6/Pid.Sus/2024/PN Slt',
            'agenda' => 'Tuntutan PU',
            'tempat' => 'PN Salatiga',
            'kategori' => 'pidum',
            'tanggal' => '2024-04-02'
        ];

        $this->db->query('INSERT INTO jadwal_sidang (id, terdakwa, jpu, no_perkara, agenda, tempat, kategori, tanggal) VALUES(:id:, :terdakwa:, :jpu:, :no_perkara:, :agenda:, :tempat:, :kategori:, :tanggal:)', $data);

        $this->db->table('jadwal_sidang')->insert($data);
    }
}
