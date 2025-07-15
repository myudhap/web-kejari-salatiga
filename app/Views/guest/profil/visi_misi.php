<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Visi Misi<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Profil</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Visi & Misi</li>
                </ol>
            </nav>
            <div class="row">
                <div class="row my-2">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Visi & Misi</strong> Kejaksaan
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <p><strong class="text-primary">VISI</strong></p>
                    <p>Mewujudkan Kejaksaan Sebagai Lembaga Penegak Hukum Yang Melaksanakan Tugasnya Secara Independen Dengan Menjunjung Tinggi Hak Asasi Manusia Dalam Negara Hukum Berdasarkan Pancasila.</p>
                    <p><strong class="text-primary">MISI</strong></p>
                    <ul class="px-5">
                        <li>Menyatukan Tata Pikir, Tata Laku Dan Tata Kerja Dalam Penegakan Hukum.</li>
                        <li>Optimalisasi Pemberantasan Korupsi Kolusi Nepotisme Dan Penuntasan Pelanggaran Hak Asasi Manusia.</li>
                        <li>Menyesuaikan Sistem Dan Tata Laksana Pelayanan Dan Penegakan Hukum Dengan Mengingat Norma Keagamaan, Kesusilaan, Kesopanan Dengan Memperhatikan Rasa Keadilan Dan Nilai-Nilai Kemanusiaan Dalam Masyarakat.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>