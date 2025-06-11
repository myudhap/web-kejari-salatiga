<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => '1',
            'judul' => 'Penutupan Praktek Pengalaman Lapangan (PPL) Mahasiswa Fakultas Syari’ah dan Hukum Universitas Islam Negeri Walisongo Semarang di Kejaksaan Negeri Salatiga',
            'isi' => 'Penutupan Praktek Pengalaman Lapangan (PPL) Mahasiswa Fakultas Syari’ah dan Hukum Universitas Islam Negeri Walisongo Semarang di Kejaksaan Negeri Salatiga telah dilaksanakan pada hari Jumat, 07 Februari 2025 di Aula Kantor Kejaksaan Negeri Salatiga oleh Kepala Kejaksaan Negeri Salatiga (Sukamto, S.H., M.H.) bersama dengan Kepala Sub Bagian Pembinaan pada Kejaksaan Negeri Salatiga (Ramlah Hasyim Parema, S.H.). Kegiatan penutupan ini meliputi serah terima sertifikat magang kepada peserta, serah terima sertifikat pengisi materi, penyerahan cinderamata dari UIN Walisongo Semarang kepada Kejaksaan Negeri Salatiga, serta kesan dan pesan.  @kejaksaan.ri @kejati.jateng #KejaksaanRI #JaksaAgungRI #KejatiJateng #KejariSalatiga #JaksaAgungRI #kejaksaanri #jaksaagung #jaksa #jaksaprofesional #jaksamenyapa #jaksasahabatmasyarakat #puspenkum #penkum #kejaksaantinggi #kejaksaannegeri #bergerakdanberkarya #adhyaksa #trapsilaadhyaksa #banggamelayanibangsa',
            'gambar' => '1743542046_89a1b0a9c06bb19fcff9.png',
            'tanggal' => '2025-02-07',
            'views' => 1
        ];

        $this->db->query('INSERT INTO berita (id, judul, isi, gambar, tanggal, views) VALUES(:id:, :judul:, :isi:, :gambar:, :tanggal:, :views:)', $data);

        $this->db->table('berita')->insert($data);
    }
}
