<?= $this->extend("main/layouts/index") ?>

<?= $this->section("title") ?>Jadwal Sidang<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section id="jadwalSidang">
    <section id="breadcrumb">
        <div class="container">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bolder">
                    <li class="breadcrumb-item">Informasi</li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Jadwal Sidang</li>
                </ol>
            </nav>
            <div class="row my-5" style="text-align: justify;">
                <div class="row gx-5 my-2">
                    <div class="col-6 text-center">
                        <h2>
                            <strong id="jadwal-title-pidum" class="jadwal active" onclick="togglePidum()">JASUM</strong>
                        </h2>
                        <strong>Jadwal Sidang Tindak Pidana Umum</strong>
                    </div>
                    <div class="col-6 text-center">
                        <h2>
                            <strong id="jadwal-title-pidsus" class="jadwal" onclick="togglePidsus()">JASUS</strong>
                        </h2>
                        <strong>Jadwal Sidang Tindak Pidana Khusus</strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <table id="jadwal-pidum" class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Terdakwa</th>
                            <th scope="col">J.P.U</th>
                            <th scope="col">No. Perkara</th>
                            <th scope="col">Agenda</th>
                            <th scope="col">Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pidum as $item): ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo esc($item['tanggal']) ?></td>
                            <td><?php echo esc($item['terdakwa']) ?></td>
                            <td><?php echo esc($item['jpu']) ?></td>
                            <td><?php echo esc($item['no_perkara']) ?></td>
                            <td><?php echo esc($item['agenda']) ?></td>
                            <td><?php echo esc($item['tempat']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <table id="jadwal-pidsus" class="table d-none">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Terdakwa</th>
                            <th scope="col">J.P.U</th>
                            <th scope="col">No. Perkara</th>
                            <th scope="col">Agenda</th>
                            <th scope="col">Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pidsus as $item): ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo esc($item['tanggal']) ?></td>
                            <td><?php echo esc($item['terdakwa']) ?></td>
                            <td><?php echo esc($item['jpu']) ?></td>
                            <td><?php echo esc($item['no_perkara']) ?></td>
                            <td><?php echo esc($item['agenda']) ?></td>
                            <td><?php echo esc($item['tempat']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
    function togglePidum() {
        const tPidum = document.getElementById('jadwal-title-pidum');
        const tPidsus = document.getElementById('jadwal-title-pidsus');
        const pidum = document.getElementById('jadwal-pidum');
        const pidsus = document.getElementById('jadwal-pidsus');

        if (pidum.classList.contains('d-none')) {
            tPidum.classList.add('active');
            tPidsus.classList.remove('active');
            pidum.classList.remove('d-none');
            pidsus.classList.add('d-none');
        }
    }

    function togglePidsus() {
        const tPidum = document.getElementById('jadwal-title-pidum');
        const tPidsus = document.getElementById('jadwal-title-pidsus');
        const pidum = document.getElementById('jadwal-pidum');
        const pidsus = document.getElementById('jadwal-pidsus');
        
        if (pidsus.classList.contains('d-none')) {
            tPidum.classList.remove('active');
            tPidsus.classList.add('active');
            pidsus.classList.remove('d-none');
            pidum.classList.add('d-none');
        }
    }
</script>
<?= $this->endSection() ?>