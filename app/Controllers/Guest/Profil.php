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
        return view('guest/profil/Sejarah', $this->data);
    }

    public function visiMisi()
    {
        return view('guest/profil/VisiMisi', $this->data);
    }

    public function logo()
    {
        return view('guest/profil/Logo', $this->data);
    }

    public function triKrama()
    {
        return view('guest/profil/TriKrama', $this->data);
    }

    public function strukturOrganisasi()
    {
        return view('guest/profil/Struktur', $this->data);
    }
}
