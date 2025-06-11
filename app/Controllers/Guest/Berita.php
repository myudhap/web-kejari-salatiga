<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $data;
    protected $beritaModel;

    public function __construct()
    {
        $this->data = [
            "base" => "Berita"
        ];
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $this->data["berita"] = $this->beritaModel->orderBy('tanggal', 'desc')->limit(5)->findAll();
        return view('main/berita/beritaView', $this->data);
    }

    public function detail($seg = false)
    {
        $this->data["berita"] = $this->beritaModel->join('users', 'users.id = berita.user_id')->find($seg);
        $this->data["beritaBaru"] = $this->beritaModel->orderBy('tanggal', 'desc')->limit(5)->findAll();

        $this->data["berita"]["views"] = $this->data["berita"]["views"] + 1;

        $this->beritaModel->where('id', $seg)->set(['views' => $this->data["berita"]["views"]])->update();

        return view('main/berita/beritaDetailView', $this->data);
    }
}
