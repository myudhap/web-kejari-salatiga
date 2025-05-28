<?php
$value = function ($key) use ($tamu) {
    return isset($tamu[$key]) ? esc($tamu[$key]) : '';
};
?>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label>Nama Petugas*</label>
            <input type="text" name="nama_petugas" class="form-control" value="<?= $value('nama_petugas') ?>" required>
        </div>
        <div class="mb-3">
            <label>Tipe Pelayanan*</label>
            <input type="text" name="tipe_pelayanan" class="form-control" value="<?= $value('tipe_pelayanan') ?>" required>
        </div>
        <div class="mb-3">
            <label>Tujuan Tamu</label>
            <textarea name="tujuan_tamu" class="form-control"><?= $value('tujuan_tamu') ?></textarea>
        </div>
        <div class="mb-3">
            <label>Data Pribadi Pengunjung</label>
            <textarea name="data_pribadi" class="form-control"><?= $value('data_pribadi') ?></textarea>
        </div>
        <div class="mb-3">
            <label>Tipe Identitas*</label>
            <select name="tipe_identitas" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="KTP" <?= $value('tipe_identitas') == 'KTP' ? 'selected' : '' ?>>KTP</option>
                <option value="SIM" <?= $value('tipe_identitas') == 'SIM' ? 'selected' : '' ?>>SIM</option>
                <option value="Passport" <?= $value('tipe_identitas') == 'Passport' ? 'selected' : '' ?>>Passport</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Nomor Identitas*</label>
            <input type="text" name="nomor_identitas" class="form-control" value="<?= $value('nomor_identitas') ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama*</label>
            <input type="text" name="nama" class="form-control" value="<?= $value('nama') ?>" required>
        </div>
        <div class="mb-3">
            <label>No HP / Whatsapp</label>
            <input type="text" name="no_hp" class="form-control" value="<?= $value('no_hp') ?>">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $value('email') ?>">
        </div>
        <div class="mb-3">
            <label>Plat Kendaraan</label>
            <input type="text" name="plat_kendaraan" class="form-control" value="<?= $value('plat_kendaraan') ?>">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin*</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" <?= $value('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $value('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?= $value('tempat_lahir') ?>">
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $value('tanggal_lahir') ?>">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $value('alamat') ?></textarea>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <?php if (!empty($tamu['foto'])): ?>
                <br>
                <img src="<?= base_url('uploads/foto/' . $tamu['foto']) ?>" width="100" class="mb-2">
            <?php endif ?>
            <input type="file" name="foto" class="form-control">
        </div>
    </div>
</div>