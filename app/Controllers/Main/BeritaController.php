<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class BeritaController extends BaseController
{
    protected $data;
    protected $model;

    public function __construct()
    {
        $this->data = [
            "base" => "Berita"
        ];
        $this->model = new BeritaModel();
    }

    public function index()
    {
        $berita = $this->model->orderBy('created_at', 'desc')->limit(2)->findAll();
        $this->data["berita"] = $berita;

        return view('main/berita/beritaView', $this->data);
    }

    public function detail($seg = false)
    {
        $berita = $this->model->join('users', 'users.id = berita.user_id')->find($seg);
        $beritaBaru = $this->model->orderBy('created_at', 'desc')->limit(5)->findAll();

        $berita['views'] = $berita['views'] + 1;

        // Update views
        $this->model->where('id', $seg)->set(['views' => $berita['views']])->update();

        $this->data["berita"] = $berita;
        $this->data["beritaBaru"] = $beritaBaru;

        return view('main/berita/beritaDetailView', $this->data);
    }
}
