<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalSidangModel;
use App\Models\JaksaModel;
use App\Models\JaksaSidangModel;

class JadwalSidang extends BaseController
{
    protected $data;
    protected $model;
    protected $jaksaModel;
    protected $jaksaSidangModel;
    protected $db;

    public function __construct()
    {
        $this->data = [
            "title" => "Jadwal Sidang"
        ];
        $this->model = new JadwalSidangModel();
        $this->jaksaModel = new JaksaModel();
        $this->jaksaSidangModel = new JaksaSidangModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        //pagination
        $page = (int) ($this->request->getGet('page') ?? 1);
        $limit = (int) ($this->request->getGet('limit') ?? 10);
        $offset = ($page - 1) * $limit;

        $sidang = $this->model->getWithJaksa($limit, $offset);

        $this->data['jpus'] = $this->jaksaModel->findAll();
        $this->data['jadwals'] = $sidang['data'];
        $this->data['total'] = $sidang['total'];
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;

        return view('admin/jadwal_sidang', $this->data);
    }

    public function create()
    {
        $data = [
            'title' => 'Jadwal Sidang',
        ];
        return view('admin/jadwal_sidang/create', $data);
    }


    public function store()
    {
        $rules = [
            'terdakwa' => 'required|string|max_length[255]',
            'jaksa_id' => 'required',
            'jaksa_id.*' => 'required|is_natural_no_zero',
            'no_perkara' => 'required',
            'agenda' => 'required',
            'tempat' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost(['terdakwa', 'no_perkara', 'agenda', 'tempat', 'kategori', 'tanggal']);
        $jaksaIds = $this->request->getPost('jaksa_id') ?? [];

        $this->db->transStart();

        try {
            $this->model->insert($data);
            $jadwalId = $this->model->insertID();

            foreach ($jaksaIds as $jaksaId) {
                if (!$this->jaksaModel->find($jaksaId)) {
                    return redirect()->back()->withInput()->with('error', "Jaksa dengan ID $jaksaId tidak ditemukan.");
                } else {
                    $this->jaksaSidangModel->insert([
                        'jadwal_sidang_id' => $jadwalId,
                        'jaksa_id' => $jaksaId
                    ]);
                }
            }
        } catch (\Exception $e) {
            $this->db->transRollback();
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan jadwal sidang: ' . $e->getMessage());
        }

        $this->db->transComplete();

        if (!$this->db->transStatus()) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan jadwal sidang.');
        }

        return redirect()->to('/panel/jadwal-sidang')->with('success', 'Jadwal sidang berhasil ditambahkan.');
    }

    public function update($id)
    {
        $rules = [
            'terdakwa' => 'required|string|max_length[255]',
            'jaksa_id' => 'required',
            'jaksa_id.*' => 'required|is_natural_no_zero',
            'no_perkara' => 'required',
            'agenda' => 'required',
            'tempat' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost(['terdakwa', 'no_perkara', 'agenda', 'tempat', 'kategori', 'tanggal']);
        $jaksaIds = $this->request->getPost('jaksa_id') ?? [];

        $this->db->transStart();
        
        try {
            if (!$this->model->find($id)) {
                return redirect()->back()->withInput()->with('error', 'Jadwal sidang tidak ditemukan.');
            }

            $this->model->update($id, $data);

            // Hapus semua jaksa sidang terkait
            $this->jaksaSidangModel->where('jadwal_sidang_id', $id)->delete();

            // Tambahkan jaksa sidang baru
            foreach ($jaksaIds as $jaksaId) {
                if (!$this->jaksaModel->find($jaksaId)) {
                    return redirect()->back()->withInput()->with('error', "Jaksa dengan ID $jaksaId tidak ditemukan.");
                } else {
                    $this->jaksaSidangModel->insert([
                        'jadwal_sidang_id' => $id,
                        'jaksa_id' => $jaksaId
                    ]);
                }
            }
        } catch (\Exception $e) {
            $this->db->transRollback();
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui jadwal sidang: ' . $e->getMessage());
        }

        $this->db->transComplete();

        if (!$this->db->transStatus()) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui jadwal sidang.');
        }

        return redirect()->to('/panel/jadwal-sidang')->with('success', 'Jadwal sidang berhasil diperbarui.');
    }

    public function delete($id)
    {
        if (!$this->model->find($id)) {
            return redirect()->to('/panel/jadwal-sidang')->with('error', 'Jadwal sidang tidak ditemukan.');
        }

        // Hapus jadwal sidang
        $this->db->transStart();
        try {
            $this->model->delete($id);
            $this->jaksaSidangModel->where('jadwal_sidang_id', $id)->delete();
        } catch (\Exception $e) {
            $this->db->transRollback();
            return redirect()->to('/panel/jadwal-sidang')->with('error', 'Gagal menghapus jadwal sidang: ' . $e->getMessage());
        }
        $this->db->transComplete();
        if (!$this->db->transStatus()) {
            return redirect()->to('/panel/jadwal-sidang')->with('error', 'Gagal menghapus jadwal sidang.');
        }

        return redirect()->to('/panel/jadwal-sidang')->with('success', 'Jadwal sidang berhasil dihapus.');
    }
}
