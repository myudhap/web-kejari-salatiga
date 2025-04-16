<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class LayananController extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "base" => "Layanan"
        ];
    }

    public function survey()
    {
        return view('main/layanan/surveyView', $this->data);
    }

    public function barangBukti()
    {
        return view('main/layanan/barangBuktiView', $this->data);
    }

    public function pelayananHukumGratis()
    {
        return view('main/layanan/pelayananHukumGratisView', $this->data);
    }

    public function kunjunganTahanan()
    {
        return view('main/layanan/kunjunganTahananView', $this->data);
    }
}
