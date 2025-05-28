<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection("title") ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminLTE') ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/summernote/summernote-bs4.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <?= $this->include('admin/layouts/loader') ?>
        <!-- /.preloader -->

        <!-- Navbar -->
        <?= $this->include('admin/layouts/navbar') ?>
        <!-- /.navbar -->

        <!-- Sidebar -->
        <?= $this->include('admin/layouts/sidebar') ?>
        <!-- /.sidebar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?= $this->include('admin/layouts/contentHeader') ?>
            <!-- /.content-header -->

            <!-- Main content -->
            <?= $this->renderSection("content") ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?= $this->include('admin/layouts/footer') ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/vendor/adminLTE') ?>/dist/js/pages/dashboard.js"></script>
    <?= $this->renderSection("script") ?>
</body>

</html>