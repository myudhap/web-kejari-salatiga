<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class GuestController extends BaseController
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
        $beritaModel = new BeritaModel();

        $berita = $beritaModel->orderBy('created_at', 'desc')->limit(2)->findAll();

        $this->data["berita"] = $berita;

        return view('main/HomeView', $this->data);
    }
}
