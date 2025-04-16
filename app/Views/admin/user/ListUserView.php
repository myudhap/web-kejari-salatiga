<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>List User<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah User
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form action="/panel/berita" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body px-5">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="judulBerita" id="judulBerita" rows="2" placeholder="Enter ..."></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="isiBerita" id="isiBerita" rows="4" placeholder="Enter ..."></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="isiBerita" id="isiBerita" rows="4" placeholder="Enter ..."></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Role</label>
                                        <select class="form-control">
                                            <?php foreach($roles as $role): ?>
                                            <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success" >Simpan</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $key => $user): ?>
                            <tr>
                                <td><?= $key+1 ?>.</td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td>
                                    <?php foreach($roles as $role): 
                                        if ($role['id'] == $user['role_id']) {  ?>
                                        <?= $role['name'] ?>
                                    <?php } endforeach; ?>
                                </td>
                                <td>
                                <span>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-berita">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-update-berita" style="display: none;" aria-hidden="true">
                                        <form action="/panel/user/edit/<?= $user['id'] ?>" method="POST" enctype="multipart/form-data">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Berita</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body px-5">
                                                    <div class="form-group">
                                                        <label>Judul Berita</label>
                                                        <textarea class="form-control" name="judulBerita" id="judulBerita" rows="2"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Isi Berita</label>
                                                        <textarea class="form-control" name="isiBerita" id="isiBerita" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Berita</label>
                                                        <input type="date" name="tanggalBerita" id="tanggalBerita" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-end">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success" >Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-berita">
                                        Hapus
                                    </button>
                                    <div class="modal fade" id="modal-delete-berita" style="display: none;" aria-hidden="true">
                                        <form action="/panel/user/delete/<?= $user['id'] ?>" method="DELETE">
                                            <div class="modal-dialog modal-m">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Konfirmasi Hapus Berita?</h3>
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        <div class="col-12">
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
    
<?= $this->endSection() ?>