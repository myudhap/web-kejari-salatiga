<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
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
        $page = (int) ($this->request->getVar('page') ?? 1);
        $limit = (int) ($this->request->getVar('limit') ?? 5);
        $offset = ($page - 1) * $limit;

        $this->data["berita"] = $this->model->orderBy('tanggal', 'desc')->findAll($limit, $offset);

        $this->data['total'] = $this->model->countAll();
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;

        return view('guest/berita/index', $this->data);
    }

    public function detail($seg = false)
    {
        $this->data["berita"] = $this->model->join('users', 'users.id = berita.user_id')->find($seg);
        $this->data["beritaBaru"] = $this->model->orderBy('tanggal', 'desc')->limit(5)->findAll();

        $this->data["berita"]["views"] = $this->data["berita"]["views"] + 1;

        $this->model->where('id', $seg)->set(['views' => $this->data["berita"]["views"]])->update();

        return view('guest/berita/detail', $this->data);
    }
}
