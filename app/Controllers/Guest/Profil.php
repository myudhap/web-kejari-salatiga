<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "base" => "Profil"
        ];
    }

    public function sejarah()
    {
        return view('guest/profil/sejarah', $this->data);
    }

    public function visiMisi()
    {
        return view('guest/profil/visi_misi', $this->data);
    }

    public function logo()
    {
        return view('guest/profil/logo', $this->data);
    }

    public function triKrama()
    {
        return view('guest/profil/tri_krama', $this->data);
    }

    public function strukturOrganisasi()
    {
        return view('guest/profil/struktur', $this->data);
    }
}
