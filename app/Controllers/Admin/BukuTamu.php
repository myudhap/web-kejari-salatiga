<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;
use App\Models\LayananModel;

class BukuTamu extends BaseController
{
    protected $data;
    protected $model;
    protected $layananModel;

    public function __construct()
    {
        $this->data = [
            "title" => "Buku Tamu"
        ];
        $this->model = new BukuTamuModel();
        $this->layananModel = new LayananModel();
    }

    public function index()
    {
        $page = (int) ($this->request->getVar('page') ?? 1);
        $limit = (int) ($this->request->getVar('limit') ?? 5);
        $offset = ($page - 1) * $limit;

        $this->data['tamus'] = $this->model->orderBy("created_at", "desc")->findAll($limit, $offset);
        $this->data['layanans'] = $this->layananModel->find();

        $this->data['total'] = $this->model->countAll();
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;

        return view('admin/buku_tamu', $this->data);
    }

    public function store()
    {
        $rules = [
            'tanggal'          => 'required',
            'nama_petugas'     => 'required',
            'tipe_pelayanan'   => 'required',
            'tipe_identitas'   => 'required',
            'nomor_identitas'  => 'required',
            'nama'             => 'required',
            'jenis_kelamin'    => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tanggal'          => $this->request->getPost('tanggal'),
            'nama_petugas'     => $this->request->getPost('nama_petugas'),
            'layanan_id'       => $this->request->getPost('tipe_pelayanan'),
            'nama'             => $this->request->getPost('nama'),
            'tipe_identitas'   => $this->request->getPost('tipe_identitas'),
            'nomor_identitas'  => $this->request->getPost('nomor_identitas'),
            'no_hp'            => $this->request->getPost('no_hp'),
            'jenis_kelamin'    => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'     => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'    => $this->request->getPost('tanggal_lahir'),
            'plat_kendaraan'   => $this->request->getPost('plat'),
            'alamat'           => $this->request->getPost('alamat'),
            'foto_identitas'   => "",
            'foto_diri'        => ""
        ];

        $fileFotoDiri = $this->request->getFile('foto_diri');
        $fileFotoIdentitas = $this->request->getFile('foto_identitas');
        $fotoDiri = upload_file($fileFotoDiri, ['jpg', 'jpeg', 'png', 'pdf'], 2, "/tamu");
        $fotoIdentitas = upload_file($fileFotoIdentitas, ['jpg', 'jpeg', 'png', 'pdf'], 2, "/tamu");

        if ($fotoDiri['success']) {
            $data['foto_diri'] = $fotoDiri['data'];
        }

        if ($fotoIdentitas['success']) {
            $data['foto_identitas'] = $fotoIdentitas['data'];
        }

        if ($this->model->insert($data)) {
            return redirect()->back()->with('success', 'Data tamu berhasil ditambahkan.');
        }
        
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
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
