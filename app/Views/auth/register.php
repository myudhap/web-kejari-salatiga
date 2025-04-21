<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register - Kejari Salatiga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .logo {
            width: 80px;
            margin-bottom: 20px;
        }

        .register-box {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }
    </style>
</head>

<body>
    <div class="register-box text-center">
        <h4 class="mb-4">Daftar Akun Kejari Salatiga</h4>
        <a href="/" class="mb-4">
            <img src="<?= base_url('assets/img/logo_kejaksaan.png') ?>" alt="Logo Kejari" class="logo">
        </a>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/register/store') ?>" method="post">
            <div class="form-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
            </div>

            <!-- <div class="form-group mb-3">
                <label for="role_id" class="form-label">Pilih Role</label>
                <select name="role_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="1">ADMIN</option>
                    <option value="2">PIDSUS</option>
                    <option value="3">PIDUM</option>
                    <option value="4">DATUN</option>
                    <option value="5">BIN</option>
                    <option value="6">BB</option>
                </select>
            </div> -->

            <div class="form-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group mb-3">
                <select class="form-select" aria-label="Default select example" disabled>
                    <option selected>Select Role</option>
                    <option value="1">ADMIN</option>
                    <option value="2">PIDSUS</option>
                    <option value="3">PIDUM</option>
                    <option value="4">DATUN</option>
                    <option value="5">BIN</option>
                    <option value="6">BB</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="mt-3">
            Sudah punya akun? <a href="<?= base_url('/login') ?>">Login di sini</a>
        </div>
    </div>
</body>

</html>