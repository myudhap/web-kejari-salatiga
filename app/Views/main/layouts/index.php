<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection("title") ?> - Kejari Salatiga</title>

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img') ?>/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor') ?>/bootstrap/css/bootstrap.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor') ?>/slick/slick.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor') ?>/slick/slick-theme.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css') ?>/customize.css?v=2">
</head>

<body>
    <!-- Navbar -->
    <?= $this->include('main/layouts/navbar') ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mb-5">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        <?= $this->renderSection("content") ?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?= $this->include('main/layouts/footer') ?>

    <!-- Chat Help -->
    <?= $this->include('main/layouts/chat') ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url('assets/vendor') ?>/slick/slick.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 5 -->
    <script src="<?php echo base_url('assets/vendor') ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/570bda8e30.js" crossorigin="anonymous"></script>
    <?= $this->renderSection("script") ?>
</body>

</html>