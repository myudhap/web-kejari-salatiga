<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - Kejari Salatiga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .login-box {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }

        .logo {
            width: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="login-box text-center">
        <a href="/" class="mb-4">
            <img src="<?= base_url('assets/img/logo_kejaksaan.png') ?>" alt="Logo Kejari" class="logo">
        </a>
        <h4 class="mb-4">Login Kejari Salatiga</h4>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/login/auth') ?>" method="post">
            <div class="form-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            belum memiliki akun?
            <a href="<?= base_url('/register') ?>">Daftar di sini</a>
            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
    </div>
</body>

</html>