<?= $this->extend("admin/layouts/index") ?>

<?= $this->section("title") ?>List User<?= $this->endSection() ?>

<?= $this->section("content") ?>
<section class="content">
    <div class="row">
        <div class="col-12">
        <!-- Flashdata: Error -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        <!-- Flashdata: Success -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header float-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">
                        Tambah User
                    </button>
                    <div class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
                        <form action="/panel/user" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="name" id="name" rows="2" value="<?= old('name') ?>"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" id="username" rows="4" value="<?= old('username') ?>"></input>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="password" rows="4"></input>
                                            <div class="input-group-append">
                                                <button class="input-group-text" id="basic-addon2" type="button" onclick="togglePassword()"><i class="fas fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" rows="4" onblur="validatePassword()"></input>
                                            <div class="input-group-append">
                                                <button class="input-group-text" id="basic-addon2" type="button" onclick="toggleConfirmPassword()"><i class="fas fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role_id">
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
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td>
                                <span>
                                    <button 
                                        type="button" 
                                        class="edit-btn btn btn-warning" 
                                        data-toggle="modal" 
                                        data-target="#modal-update-berita"
                                        data-id="<?= $user['id'] ?>"
                                        data-username="<?= esc($user['username']) ?>"
                                        data-name="<?= esc($user['name']) ?>"
                                        data-role_id="<?= esc($user['role_id']) ?>"
                                    >
                                        Edit
                                    </button>
                                    <div class="modal fade" id="modal-update-berita" style="display: none;" aria-hidden="true">
                                        <form method="POST" id="editForm">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit User</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-5">
                                                        <input type="hidden" name="id" id="userId">
                                                        <?php
                                                        $fields = [
                                                            'username' => 'Username',
                                                            'name' => 'Name',
                                                            'password' => 'New Password',
                                                            'confirm_password' => 'Confirm Password'
                                                        ];
                                                        foreach ($fields as $field => $label):
                                                        ?>
                                                        <div class="form-group">
                                                            <label><?= $label ?></label>
                                                            <input 
                                                                type="<?= in_array($field, ['password', 'confirm_password']) ? 'password' : 'text' ?>"
                                                                class="form-control"
                                                                name="<?= $field ?>"
                                                                id="user<?= ucfirst($field) ?>"
                                                            >
                                                        </div>
                                                        <?php endforeach ?>
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <select class="form-control" name="role_id" id="userRole_id">
                                                                <?php foreach($roles as $role): ?>
                                                                <option value="<?= $role['id'] ?>" <?php if($user['role_id'] == $role['id']) echo "selected" ?>><?= $role['name'] ?></option>
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
                                    <a href="/panel/user/delete/<?= $user['id'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda ingin menghapus data user ini?');">
                                        Hapus
                                    </a>
                                </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <?php for ($i = 1; $i <= ceil($total / $limit); $i++): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $i ?>&limit=<?= $limit ?>" <?= ($i == $page ? 'style="font-weight: bold;"' : '') ?>>
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        <div class="col-12">
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
    function togglePassword() {
        console.log('test');
        var passwordInput = document.getElementById('password');
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
    function toggleConfirmPassword() {
        var confirmPasswordInput = document.getElementById('confirmPassword');
        confirmPasswordInput.type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
    }
    function validatePassword() {
        var passwordInput = document.getElementById('password');
        var confirmPasswordInput = document.getElementById('confirmPassword');
        if (passwordInput.value !== confirmPasswordInput.value) {
            console.log('test');
            confirmPasswordInput.setCustomValidity('Konfirm Password tidak sama');
        } else {
            confirmPasswordInput.setCustomValidity('');
        }

        confirmPasswordInput.reportValidity();
    }
</script>
<script>
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.onclick = () => {
            ['id', 'username', 'name', 'role_id'].forEach(f => {
                document.getElementById('user' + f.charAt(0).toUpperCase() + f.slice(1)).value = btn.dataset[f];
            });

            document.getElementById('userPassword').value = '';
            document.getElementById('userConfirm_password').value = '';

            document.getElementById('editForm').action = `/panel/user/edit/${btn.dataset.id}`;
        }
    })
</script>
<?= $this->endSection() ?>