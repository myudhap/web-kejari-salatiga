<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\LayananPengambilanBarangBuktiModel;
use App\Models\KunjunganTahananModel;
use function Config\validate_input;

class Layanan extends BaseController
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

    public function storeBarangBukti()
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

        $rules = [
            "nama_pemohon" => "required",
            "alamat" => "required",
            "pekerjaan" => "required",
            "nomor_telepon" => "required",
            "tanda_pengenal" => "required",
            "barang_bukti" => "required",
            "nama_terpidana" => "required"
        ];

        $folder = 'layanan/barang_bukti/' . $data['nama_pemohon'] . "_" . $data['nomor_telepon'] . "_" . time_now_to_string('Y-m-d');

        // Helper for file upload
        $fileFields = [
            'tandaPengenal' => 'tanda_pengenal',
            'suratKuasa'    => 'surat_kuasa',
            'buktiMilik'    => 'bukti_kepemilikan'
        ];

        foreach ($fileFields as $inputName => $key) {
            $upload = upload_file($this->request->getFile($inputName), ['jpg', 'jpeg', 'png', 'pdf'], 1, $folder);
            if (!$upload['success']) {
                session()->setFlashdata("error", $upload['errors']);
                return redirect()->back();
            }
            $data[$key] = $upload['data'];
        }

        // Validate input
        $result = validate_input($data, $rules);
        if (!$result['success']) {
            session()->setFlashdata("error", "Harap Isi Data yang Dibutuhkan");
            return redirect()->back();
        }

        // Generate registration number
        $data['nomor_registrasi'] = generate_random_string(7, true);

        // Insert to database
        $model = new LayananPengambilanBarangBuktiModel();
        if ($model->insert($data)) {
            session()->setFlashdata("success_create", $data['nomor_registrasi']);
        } else {
            session()->setFlashdata("error", "Gagal untuk menambahkan data");
        }
        return redirect()->back();
    }

    public function checkBarangBukti()
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

        if ($data["status"] === "done") {
            $status = "Selesai";
        } elseif ($data["status"] === "waiting") {
            $status = "Menunggu";
        } else {
            $status = "Dalam Proses";
        }

        session()->setFlashdata([
            "success_check" => true,
            "nomor_registrasi" => $nomor_registrasi,
            "status" => $status
        ]);
        return redirect("layanan.barang_bukti");
    }

    public function pelayananHukumGratis()
    {
        return view('main/layanan/pelayananHukumGratisView', $this->data);
    }

    public function kunjunganTahanan()
    {
        return view('main/layanan/kunjunganTahananView', $this->data);
    }

    public function storeKunjunganTahanan()
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
        }
        $data['tanda_pengenal'] = $tandaPengenal['data'];

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
            session()->setFlashdata("error", "Harap Isi Data yang Dibutuhkan");
            return redirect()->back();
        }

        $nomorRegistrasi = generate_random_string(7, true);
        $data['nomor_registrasi'] = "BETA_" . $nomorRegistrasi;

        $model = new KunjunganTahananModel();
        if ($model->insert($data)) {
            session()->setFlashdata("success_create", $nomorRegistrasi);
        } else {
            session()->setFlashdata("error", "Gagal untuk menambahkan data");
        }
        return redirect()->back();
    }

    public function checkKunjunganTahanan()
    {
        $nomorRegistrasi = $this->request->getPost('nomorRegistrasi');
        $model = new KunjunganTahananModel();
        $data = $model->where("nomor_registrasi", $nomorRegistrasi)->first();

        if ($data == null) {
            session()->setFlashdata([
                "success_check" => false,
                "nomor_registrasi" => $nomorRegistrasi
            ]);
            return redirect("layanan.barang_bukti");
        }

        $result = ($data["status"] == "dones") ? "selesai" : "on process";
        session()->setFlashdata([
            "success_check" => true,
            "nomor_registrasi" => $nomorRegistrasi,
            "status" => $result
        ]);
        return redirect("layanan.barang_bukti");
    }
}
