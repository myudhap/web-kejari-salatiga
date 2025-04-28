<?php

namespace App\Controllers\Data;

use App\Controllers\BaseController;
use App\Models\LayananPengambilanBarangBuktiModel;

use function Config\validate_input;

class BarangBuktiController extends BaseController
{
    public function index()
    {
        //
    }

    public function storePengambilanBarangBukti()
    {
        $data = [
            "nama_pemohon" => $this->request->getPost('namaPemohon'),
            "nama_terpidana" => $this->request->getPost('namaTerpidana'),
            "alamat" => $this->request->getPost('alamatLengkap'),
            "pekerjaan" => $this->request->getPost('pekerjaan'),
            "nomor_telepon" => $this->request->getPost('nomorTelepon'),
            "perkara" => $this->request->getPost('perkara'),
            "barang_bukti" => $this->request->getPost('barangBukti'),
            "status" => "on_process",
        ];

        $folder = 'layanan/barang_bukti/' . $data['nama_pemohon'] . "_" . $data['nomor_telepon'] . "_" . time_now_to_string('Y-m-d');

        $tandaPengenal = upload_file($this->request->getFile('tandaPengenal'), ['jpg', 'jpeg', 'png', 'pdf'], 1, $folder);
        if (!$tandaPengenal['success']) {
            session()->setFlashdata("error", $tandaPengenal['errors']);
            return redirect()->back();
        } else {
            $data['tanda_pengenal'] = $tandaPengenal['data'];
        }

        $suratKuasa = upload_file($this->request->getFile('suratKuasa'), ['jpg', 'jpeg', 'png', 'pdf'], 1, $folder);
        if (!$suratKuasa['success']) {
            session()->setFlashdata("error", $suratKuasa['errors']);
            return redirect()->back();
        } else {
            $data['surat_kuasa'] = $suratKuasa['data'];
        }

        $buktiMilik = upload_file($this->request->getFile('buktiMilik'), ['jpg', 'jpeg', 'png', 'pdf'], 1, $folder);
        if (!$buktiMilik['success']) {
            session()->setFlashdata("error", $buktiMilik['errors']);
            return redirect()->back();
        } else {
            $data['bukti_kepemilikan'] = $buktiMilik['data'];
        }

        $rules = [
            "nama_pemohon" => "required",
            "alamat" => "required",
            "pekerjaan" => "required",
            "nomor_telepon" => "required",
            "tanda_pengenal" => "required",
            "barang_bukti" => "required",
            "nama_terpidana" => "required"
        ];

        $result = validate_input($data, $rules);

        if (!$result['success']) {
            session()->setFlashdata("error", "Harap Isi Data yang Dibutuhkan");
            return redirect()->back();
        }

        $nomorRegistrasi = generate_random_string(7, true);
        $data['nomor_registrasi'] = $nomorRegistrasi;

        $model = new LayananPengambilanBarangBuktiModel();

        if ($model->insert($data)) {
            session()->setFlashdata("success_create", $nomorRegistrasi);
            return redirect()->back();
        } else {
            session()->setFlashdata("error", "Gagal untuk menambahkan data");
            return redirect()->back();
        }
    }

    public function checkPengambilanBarangBukti()
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
