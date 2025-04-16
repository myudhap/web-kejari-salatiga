<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class HomeController extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "base" => "Beranda"
        ];
    }

    public function index()
    {
        $beritaModel = new BeritaModel();

        $berita = $beritaModel->orderBy('created_at', 'desc')->limit(2)->findAll();

        $this->data["berita"] = $berita;

        return view('main/HomeView', $this->data);
    }
}
