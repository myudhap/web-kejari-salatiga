<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananPengambilanBarangBuktiModel;

class Layanan extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "title" => "Layanan"
        ];
    }

    public function barangBukti()
    {
        $this->data['subtitle'] = "Pengambilan Barang Bukti";

        $model = new LayananPengambilanBarangBuktiModel();
        $this->data['items'] = $model->findAll();

        return view('admin/layanan/barangBuktiView', $this->data);
    }
}
