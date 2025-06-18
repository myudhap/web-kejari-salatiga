<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Dashboard extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "title" => "Dashboard"
        ];
    }

    public function index()
    {
        $beritaModel = new BeritaModel();

        $this->data['users'] = [1,2,3,4];
        $this->data['berita'] = $beritaModel->findAll();

        return view('admin/dashboard', $this->data);
    }
}
