<?php
    class Nav
    {
        public $name;
        public $icon;
        public $href;
        public $hasList = false;
        public $list;
        public $listHref;
    }

    $nav1 = new Nav();
    $nav1->name = "Dashboard";
    $nav1->icon = "fa-th";
    $nav1->href = "/panel";

    $nav2 = new Nav();
    $nav2->name = "User";
    $nav2->icon = "fa-user";
    $nav2->hasList = true;
    $nav2->list = array('List User', 'List Role', 'List Permission');
    $nav2->listHref = array('/panel/list-user', '/panel/list-role', '/panel/list-permission');

    $nav3 = new Nav();
    $nav3->name = "Berita";
    $nav3->icon = "fa-newspaper";
    $nav3->href = "/panel/berita";

    $nav4 = new Nav();
    $nav4->name = "Jadwal Sidang";
    $nav4->icon = "fa-calendar";
    $nav4->hasList = true;
    $nav4->list = array('Pidana Umum', 'Pidana Khusus');
    $nav4->listHref = array('/pidana-umum', '/pidana-khusus');

    $nav4 = new Nav();
    $nav4->name = "Layanan";
    $nav4->icon = "fa-calendar";
    $nav4->hasList = true;
    $nav4->list = array('Pengambilan Barang Bukti', 'Hukum Gratis', 'Kunjungan Tahanan');
    $nav4->listHref = array('/panel/layanan/barang-bukti', '/panel/layanan/hukum-gratis', '/panel/layanan/kunjungan-tahanan');

    $navList = array($nav1, $nav2, $nav3, $nav4);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets') ?>/img/logo_kejaksaan.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kejari Salatiga</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info text-center mx-auto">
                <a href="#" class="d-block">Username</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach($navList as $nav): ?>
                <li class="nav-item <?php if ($title == $nav->name && $nav->hasList) echo "menu-is-opening menu-open" ?>">
                    <a href="<?= $nav->href ?>" class="nav-link <?php if ($title == $nav->name) echo "active" ?>">
                        <i class="nav-icon fas <?= $nav->icon ?>"></i>
                        <p>
                            <?= $nav->name ?>
                            <?php if($nav->hasList): ?>
                            <i class="right fas fa-angle-left"></i>
                            <?php endif ?>
                        </p>
                    </a>
                    <?php if($nav->hasList): ?>
                    <ul class="nav nav-treeview">
                        <?php foreach($nav->list as $key => $list): ?>
                        <li class="nav-item">
                            <a href="<?= $nav->listHref[0] ?>" class="nav-link  <?php if (isset($subtitle) && $subtitle == $list) echo "active" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= $list ?></p>
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</aside>