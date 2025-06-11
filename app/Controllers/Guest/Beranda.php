<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Beranda extends BaseController
{
    protected $data;
    protected $beritaModel;

    public function __construct()
    {
        $this->data = [
            "base" => "Beranda"
        ];
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $this->data["berita"] = $this->beritaModel->orderBy('tanggal', 'desc')->limit(2)->findAll();
        return view('main/HomeView', $this->data);
    }
}
