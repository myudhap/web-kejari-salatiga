<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KunjunganTahananModel;

use function Config\validate_input;

class KunjunganTahananController extends BaseController
{
    public function index()
    {
        //
    }

    public function store()
    {
        $data = [
            "nama_pemohon" => $this->request->getPost('namaPemohon'),
            "alamat" => $this->request->getPost('alamatLengkap'),
            "pekerjaan" => $this->request->getPost('pekerjaan'),
            "hubungan" => $this->request->getPost('hubungan'),
            "keperluan" => $this->request->getPost('keperluan'),
            "tanggal_kunjungan" => $this->request->getPost('tanggalKunjungan'),
            "nomor_telepon" => $this->request->getPost('nomorTelepon'),
            "nama_tersangka" => $this->request->getPost('namaTersangka'),
            "alamat_tersangka" => $this->request->getPost('alamatTersangka'),
            "ttl_tersangka" => $this->request->getPost('ttlTersangka'),
            "jenis_kelamin_tersangka" => $this->request->getPost('jenisKelaminTersangka'),
            "agama_tersangka" => $this->request->getPost('agamaTersangka'),
            "pekerjaan_tersangka" => $this->request->getPost('pekerjaanTersangka'),
            "status" => "on_process",
        ];

        $folder = 'layanan/kunjungan_tahanan/' . $data['nama_pemohon'] . "_" . $data['nomor_telepon'] . "_" . $data['tanggal_kunjungan'];

        $tandaPengenal = upload_file($this->request->getFile('tandaPengenal'), ['jpg', 'jpeg', 'png', 'pdf'], 1, $folder);
        if (!$tandaPengenal['success']) {
            session()->setFlashdata("error", $tandaPengenal['errors']);
            return redirect()->back();
        } else {
            $data['tanda_pengenal'] = $tandaPengenal['data'];
        }

        $rules = [
            "nama_pemohon" => 'required',
            "alamat" => 'required',
            "pekerjaan" => 'required',
            "hubungan" => 'required',
            "keperluan" => 'required',
            "tanggal_kunjungan" => 'required',
            "nomor_telepon" => 'required',
            "tanda_pengenal" => 'required',
            "nama_tersangka" => 'required',
            "alamat_tersangka" => 'required',
            "jenis_kelamin_tersangka" => 'required'
        ];

        $result = validate_input($data, $rules);

        if (!$result['success']) {
            dd($result);
            session()->setFlashdata("error", "Harap Isi Data yang Dibutuhkan");
            return redirect()->back();
        }

        $nomorRegistrasi = generate_random_string(7, true);
        $data['nomor_registrasi'] = "BETA_" . $nomorRegistrasi;

        $model = new KunjunganTahananModel();

        if ($model->insert($data)) {
            session()->setFlashdata("success_create", $nomorRegistrasi);
            return redirect()->back();
        } else {
            session()->setFlashdata("error", "Gagal untuk menambahkan data");
            return redirect()->back();
        }
    }

    public function check()
    {
        $nomor_registrasi = $this->request->getPost('nomorRegistrasi');

        $model = new LayananPengambilanBarangBuktiModel();

        $data = $model->where("nomor_registrasi", $nomor_registrasi)->first();
        
        if ($data == null) {
            session()->setFlashdata([
                "success_check" => false,
                "nomor_registrasi" => $nomor_registrasi
            ]);
            return redirect("layanan.barang_bukti");
        }
        
        $result = "on process";
        if ($data["status"] == "dones") {
            $result = "selesai";
        } 

        session()->setFlashdata([
            "success_check" => true,
            "nomor_registrasi" => $nomor_registrasi,
            "status" => $result
        ]);
        return redirect("layanan.barang_bukti");
    }
}
