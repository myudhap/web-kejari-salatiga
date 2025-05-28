<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuTamuModel extends Model
{
    protected $table      = 'buku_tamu';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_petugas',
        'tipe_pelayanan',
        'tujuan_tamu',
        'data_pribadi', // ✅ Tambahkan ini!
        'tipe_identitas',
        'nomor_identitas',
        'nama',
        'no_hp',
        'email',
        'plat_kendaraan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'foto'
    ];


    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
