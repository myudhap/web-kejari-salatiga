<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;

class BukuTamuController extends BaseController
{
    protected $bukuTamuModel;

    /*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Constructor
     *
     * @return void
     */
    /*******  8eae4dc2-99b0-43fb-94d3-2a09480c37db  *******/
    public function __construct()
    {
        $this->bukuTamuModel = new BukuTamuModel();
    }

    public function index()
    {
        $data['buku_tamu'] = $this->bukuTamuModel->orderBy('created_at', 'DESC')->findAll();
        $data['title'] = 'Buku Tamu';  // Make sure this matches your nav name exactly
        $data['subtitle'] = '';         // Or set if submenu active
        return view('admin/buku_tamu/index', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Tambah Buku Tamu',
            'tamu' => null
        ];
        return view('admin/buku_tamu/create', $data);
    }


    public function store()
    {
        $model = new BukuTamuModel();

        $file = $this->request->getFile('foto');
        $filename = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/', $filename);
        }

        $data = [
            'nama_petugas'     => $this->request->getPost('nama_petugas'),
            'tipe_pelayanan'   => $this->request->getPost('tipe_pelayanan'),
            'tujuan_tamu'      => $this->request->getPost('tujuan_tamu'),
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

        if (!$model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('panel/buku_tamu')->with('success', 'Data berhasil disimpan');
    }




    public function edit($id)
    {
        $data['tamu'] = $this->bukuTamuModel->find($id);
        $data['title'] = 'Buku Tamu';
        return view('admin/buku_tamu/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid()) {
            $filename = $foto->getRandomName();
            $foto->move('uploads/foto/', $filename);
            $data['foto'] = $filename;
        }
        $this->bukuTamuModel->update($id, $data);
        return redirect()->to('panel/buku-tamu')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->bukuTamuModel->delete($id);
        return redirect()->to('panel/buku-tamu')->with('success', 'Data berhasil dihapus.');
    }
}
