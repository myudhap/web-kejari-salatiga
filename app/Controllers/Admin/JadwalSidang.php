<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalSidangModel;

class JadwalSidang extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalSidangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal Sidang',
            'jadwals' => $this->jadwalModel->findAll(),
        ];
        return view('admin/jadwal/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Jadwal Sidang',
        ];
        return view('admin/jadwal/create', $data);
    }


    public function store()
    {
        $this->jadwalModel->save($this->request->getPost());
        return redirect()->to('/panel/jadwal-sidang')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Jadwal Sidang',
            'jadwal' => $this->jadwalModel->find($id),
        ];
        return view('admin/jadwal/edit', $data);
    }


    public function update($id)
    {
        $this->jadwalModel->update($id, $this->request->getPost());
        return redirect()->to('/panel/jadwal-sidang')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->jadwalModel->delete($id);
        return redirect()->to('/panel/jadwal-sidang')->with('success', 'Jadwal berhasil dihapus.');
    }
}
