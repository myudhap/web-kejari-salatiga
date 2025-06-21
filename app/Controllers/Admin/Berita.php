<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

use function Config\validate_input;

class Berita extends BaseController
{
    protected $data;
    protected $model;

    public function __construct()
    {
        $this->data = [
            "title" => "Berita"
        ];
        $this->model = new BeritaModel();
    }

    public function index()
    {
        //pagination
        $page = (int) ($this->request->getVar('page') ?? 1);
        $limit = (int) ($this->request->getVar('limit') ?? 5);
        $offset = ($page - 1) * $limit;

        $this->data['beritas'] = $this->model->orderBy("tanggal", "desc")->findAll($limit, $offset);

        $this->data['total'] = $this->model->countAll();
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;

        return view('admin/berita', $this->data);
    }

    public function store()
    {
        $data = [
            "judul" => $this->request->getPost("judulBerita"),
            "isi" => $this->request->getPost("isiBerita"),
            "tanggal" => $this->request->getPost("tanggalBerita"),
            "gambar" => "default.png",
            "views" => 1,
            "user_id" => 1
        ];

        $beritaImage = upload_file($this->request->getFile('gambarBerita'), ['jpg', 'jpeg', 'png', 'pdf'], 2, "/berita");
        if (!$beritaImage['success']) {
            session()->setFlashdata("error", $beritaImage['errors']);
            return redirect()->back();
        } else {
            if ($beritaImage['data'] == null) {
                $data['gambar'] = "default.png";
            } else {
                $data['gambar'] = $beritaImage['data'];
            }
        }

        $rules = [
            "judul" => "required",
            "isi" => "required",
            "tanggal" => "required",
            "gambar" => "required",
            "views" => "required",
            "user_id" => "required"
        ];

        $result = validate_input($data, $rules);

        if (!$result['success']) {
            session()->setFlashdata("error", "Harap Isi Data yang Dibutuhkan");
            return redirect()->back();
        }

        $model = new BeritaModel();
        if ($model->insert($data)) {
            return redirect()->back();
        } else {
            session()->setFlashdata("error", "Gagal untuk menambahkan data");
            return redirect()->back();
        }
    }

    public function update($id)
    {
        // Validation rules
        $rules = [
            "judul"   => "required",
            "isi"     => "required",
            "tanggal" => "required",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with("errors", $this->validator->getErrors());
        }

        $data = $this->request->getPost(["judul", "isi", "tanggal"]);
        $data["user_id"] = session()->get('user_id');

        $file = $this->request->getFile('gambar');
        $beritaImage = upload_file($file, ['jpg', 'jpeg', 'png', 'pdf'], 2, "/berita");
        if (!$beritaImage['success']) {
            return redirect()->back()->withInput()->with("errors", $beritaImage['errors']);
        } else if ($beritaImage['data']) {
            $data['gambar'] = $beritaImage['data'];
        }

        if ($this->model->update($id, $data)) {
            session()->setFlashdata("success", "Berita berhasil diupdate");
        } else {
            session()->setFlashdata("error", "Gagal mengupdate data");
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $model = new BeritaModel();
        $berita = $model->find($id);
        if ($berita) {
            $model->delete($id);
            session()->setFlashdata("success", "Berita berhasil dihapus");
        } else {
            session()->setFlashdata("error", "Berita tidak ditemukan");
        }
        return redirect()->back();
    }
}
