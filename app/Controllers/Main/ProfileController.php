<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "base" => "Profile"
        ];
    }

    public function sejarah()
    {
        return view('main/profile/SejarahView', $this->data);
    }

    public function visiMisi()
    {
        return view('main/profile/VisiMisiView', $this->data);
    }

    public function logo()
    {
        return view('main/profile/LogoView', $this->data);
    }

    public function triKrama()
    {
        return view('main/profile/TriKramaView', $this->data);
    }

    public function strukturOrganisasi()
    {
        return view('main/profile/StrukturView', $this->data);
    }
}
