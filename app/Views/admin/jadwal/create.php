<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome (untuk ikon edit dan hapus) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Tambah Jadwal Sidang</h2>

    <form action="/panel/jadwal-sidang/store" method="post">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="mb-3">
            <label for="terdakwa" class="form-label">Terdakwa</label>
            <input type="text" class="form-control" id="terdakwa" name="terdakwa" required>
        </div>

        <div class="mb-3">
            <label for="jpu" class="form-label">JPU</label>
            <input type="text" class="form-control" id="jpu" name="jpu" required>
        </div>

        <div class="mb-3">
            <label for="no_perkara" class="form-label">No Perkara</label>
            <input type="text" class="form-control" id="no_perkara" name="no_perkara" required>
        </div>

        <div class="mb-3">
            <label for="agenda" class="form-label">Agenda</label>
            <textarea class="form-control" id="agenda" name="agenda" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="" selected disabled>Pilih Kategori</option>
                <option value="pidum">PIDUM</option>
                <option value="pidsus">PIDSUS</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="tempat" class="form-label">Tempat</label>
            <input type="text" class="form-control" id="tempat" name="tempat" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="/panel/jadwal-sidang" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Batal
            </a>
        </div>
    </form>
</div>