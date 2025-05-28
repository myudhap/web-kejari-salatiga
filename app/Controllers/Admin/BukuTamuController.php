<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;

class BukuTamuController extends BaseController
{
    /*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Menampilkan halaman index buku tamu
     *
     * @return view
     */
    /*******  5482b1e7-201f-4428-b610-b69ba54efd70  *******/
    public function index()
    {
        $model = new BukuTamuModel();
        $data['tamus'] = $model->orderBy('created_at', 'DESC')->findAll();
        $data['title'] = 'Buku Tamu'; // ✅ Tambahkan ini
        return view('admin/buku_tamu/index', $data);
    }

    public function store()
    {
        $model = new \App\Models\BukuTamuModel();

        $file = $this->request->getFile('foto');
        $filename = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/foto/', $filename);
        }

        $data = [
            'nama_petugas'     => $this->request->getPost('nama_petugas'),
            'tipe_pelayanan'   => $this->request->getPost('tipe_pelayanan'),
            'tujuan_tamu'      => $this->request->getPost('tujuan_tamu'),
            'data_pribadi'     => $this->request->getPost('data_pribadi'), // ✅ penting
            'tipe_identitas'   => $this->request->getPost('tipe_identitas'),
            'nomor_identitas'  => $this->request->getPost('nomor_identitas'),
            'nama'             => $this->request->getPost('nama'),
            'no_hp'            => $this->request->getPost('no_hp'),
            'email'            => $this->request->getPost('email'),
            'plat_kendaraan'   => $this->request->getPost('plat_kendaraan'),
            'jenis_kelamin'    => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'     => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'    => $this->request->getPost('tanggal_lahir'),
            'alamat'           => $this->request->getPost('alamat'),
            'foto'             => $filename
        ];

        // Debug: tampilkan data jika insert gagal
        if (!$model->insert($data)) {
            dd([
                'data' => $data,
                'errors' => $model->errors(),
            ]);
        }

        return redirect()->to(base_url('panel/buku-tamu'))->with('success', 'Data tamu berhasil ditambahkan.');
    }


    public function create()
    {
        $data['title'] = 'Tambah Buku Tamu'; // jika digunakan
        return view('admin/buku_tamu/create', $data); // ✅ ini HARUS cocok dengan lokasi file
    }


    public function update($id)
    {
        $model = new BukuTamuModel();
        $data = $this->request->getPost();
        $file = $this->request->getFile('foto');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/foto/', $filename);
            $data['foto'] = $filename;
        }

        $model->update($id, $data);
        return redirect()->back()->with('success', 'Data tamu berhasil diperbarui.');
    }

    public function edit($id)
    {
        $model = new BukuTamuModel();
        $tamu = $model->find($id);

        if (!$tamu) {
            return redirect()->to('panel/buku-tamu')->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/buku_tamu/edit', [
            'tamu' => $tamu,
            'title' => 'Buku Tamu'
        ]);
    }


    public function delete($id)
    {
        $model = new BukuTamuModel();
        $model->delete($id);
        return redirect()->back()->with('success', 'Data tamu berhasil dihapus.');
    }
}
