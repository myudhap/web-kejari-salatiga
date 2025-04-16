<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\JadwalSidangModel;

class InformasiController extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "base" => "Informasi"
        ];
    }

    public function jadwalSidang()
    {
        $jadwalSidangModel = new JadwalSidangModel();

        $pidum = $jadwalSidangModel->where('kategori', 'pidum')->orderBy('tanggal', 'desc')->limit(10)->findAll();
        $pidsus = $jadwalSidangModel->where('kategori', 'pidsus')->orderBy('tanggal', 'desc')->limit(10)->findAll();

        $this->data["pidum"] = $pidum;
        $this->data["pidsus"] = $pidsus;

        return view('main/informasi/jadwalSidangView', $this->data);
    }
}
