<?php
class Nav
{
    public $name;
    public $icon;
    public $href;
    public $hasList = false;
    public $list;
    public $listHref;
    public $roles = [1];
}

$nav1 = new Nav();
$nav1->name = "Dashboard";
$nav1->icon = "fa-th";
$nav1->href = "/panel";
$nav1->roles = [1, 2, 3, 4, 5, 6, 7, 8];

$nav2 = new Nav();
$nav2->name = "User";
$nav2->icon = "fa-user";
$nav2->hasList = true;
$nav2->list = array('List User', 'List Role', 'List Permission');
$nav2->listHref = array('/panel/user', '/panel/role', '/panel/permission');
$nav2->roles = [1];

$nav3 = new Nav();
$nav3->name = "Berita";
$nav3->icon = "fa-newspaper";
$nav3->href = "/panel/berita";
$nav3->roles = [1, 2, 3, 4, 5, 6, 7];

$nav4 = new Nav();
$nav4->name = "Jadwal Sidang";
$nav4->icon = "fa-calendar";
$nav4->hasList = false;
$nav4->href = '/panel/jadwal-sidang';
$nav4->roles = [1, 4, 5];

$nav5 = new Nav();
$nav5->name = "Layanan";
$nav5->icon = "fa-globe";
$nav5->hasList = true;
$nav5->list = array('Pengambilan Barang Bukti', 'Hukum Gratis', 'Kunjungan Tahanan');
$nav5->listHref = array('/panel/layanan/barang-bukti', '/panel/layanan/hukum-gratis', '/panel/layanan/kunjungan-tahanan');
$nav5->roles = [1, 7];

$nav6 = new Nav();
$nav6->name = "Buku Tamu";
$nav6->icon = "fa-book";
$nav6->hasList = false;
$nav6->href = '/panel/buku-tamu';
$nav6->roles = [1, 8];

$navList = array($nav1, $nav2, $nav3, $nav4, $nav5, $nav6);
$session = session();
$role_id = $session->get('role_id');
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <img src="<?php echo base_url('assets') ?>/img/logo_kejaksaan.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kejari Salatiga</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info text-center mx-auto">
                <a href="#" class="d-block"><?= $session->get('name') ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($navList as $nav): ?>
                    <li class="nav-item <?php if ($title == $nav->name && $nav->hasList) echo "menu-is-opening menu-open" ?>" <?php if(!in_array($role_id, $nav->roles)) echo "hidden" ?>>
                        <a href="<?= $nav->href ?>" class="nav-link <?php if ($title == $nav->name) echo "active" ?>">
                            <i class="nav-icon fas <?= $nav->icon ?>"></i>
                            <p>
                                <?= $nav->name ?>
                                <?php if ($nav->hasList): ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php endif ?>
                            </p>
                        </a>
                        <?php if ($nav->hasList): ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($nav->list as $key => $list): ?>
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
                <li class="nav-item ">
                    <a href="/panel/logout" class="nav-link text-red">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>