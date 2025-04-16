<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Logo Kejaksaan<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section>
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Profil</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Logo Kejaksaan</li>
                </ol>
            </nav>
            <div class="row">
                <div class="row my-2">
                    <div class="col text-center">
                        <h2>
                            <strong class="text-primary">Logo</strong> Kejaksaan
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center my-5">
                    <img src="<?php echo base_url('assets') ?>/img/logo_kejaksaan.png" alt="" width="30%">
                    </div>
                    <p><strong class="text-primary">Bintang Bersudut Tiga</strong></p>
                    <p>Bintang adalah salah satu benda alam ciptaan Tuhan Yang Maha Esa yang tinggi letaknya dan memancarkan cahaya abadi. Sedangkan jumlah tiga buah merupakan pantulan dari Trapsila Adhyaksa sebagai landasan kejiwaan warga Adhyaksa yang harus dihayati dan diamalkan.</p>
                    <p><strong class="text-primary">Pedang</strong></p>
                    <p>Senjata pedang melambangkan kebenaran, senjata untuk membasmi kemungkaran/kebathilan dan kejahatan.</p>
                    <p><strong class="text-primary">Timbangan</strong></p>
                    <p>Timbangan adalah lambang keadilan, keadilan yang diperoleh melalui keseimbangan antara suratan dan siratan rasa.</p>
                    <p><strong class="text-primary">Padi & Kapas</strong></p>
                    <p>Padi dan kapas melambangkan kesejahteraan dan kemakmuran yang menjadi dambaan masyarakat.</p>
                    <p><strong class="text-primary">Makna tata warna</strong></p>
                    <ul class="px-5">
                        <li>Warna kuning diartikan luhur, keluhuran makna yang dikandung dalam gambar/lukisan, keluhuran yang dijadikan cita-cita.</li>
                        <li>Warna hijau diberi arti tekun, ketekunan yang menjadi landasan pengejaran/pengraihan cita-cita.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>

<?= $this->endSection() ?>