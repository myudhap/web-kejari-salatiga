<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class BidangController extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [
            "base" => "Bidang"
        ];
    }

    public function pembinaan()
    {
        return view('main/bidang/pembinaanView', $this->data);
    }

    public function intel()
    {
        return view('main/bidang/intelView', $this->data);
    }

    public function pidum()
    {
        return view('main/bidang/pidumView', $this->data);
    }

    public function pidsus()
    {
        return view('main/bidang/pidsusView', $this->data);
    }

    public function datun()
    {
        return view('main/bidang/datunView', $this->data);
    }

    public function pb3r()
    {
        return view('main/bidang/pb3rView', $this->data);
    }
}
