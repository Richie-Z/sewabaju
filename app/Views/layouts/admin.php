<?php
$session = session();
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Admin - Sistem Penyewaan Baju Berbasis Web</title>
    <link rel="shortcut icon" href="<?= base_url("admin_assets/img/fav.png") ?>">

    <!-- Font awesome -->
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/font-awesome.min.css") ?>">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/bootstrap.min.css") ?>">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/dataTables.bootstrap.min.css") ?>">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/bootstrap-social.css") ?>">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/bootstrap-select.css") ?>">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/fileinput.min.css") ?>">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/awesome-bootstrap-checkbox.css") ?>">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/style.css") ?>">
</head>

<body>
    <div class="brand clearfix">
        <a href="<?= base_url("admin/dashboard") ?>" style="font-size: 20px;"><img src="<?= base_url("admin_assets/img/icon.png") ?>" width="250px" height="65px" style="object-fit:cover"></a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <a href="#">
                    <img src="<?= base_url("admin_assets/img/" . $session->get('image')) ?>" width="20px" height="20px" padding="0px">&nbsp;
                    <?= $session->get("name") ?>
                    <span class="fa fa-angle-down"></span>
                </a>
                <ul>
                    <li><a href="<?= base_url("admin/change") ?>"><i class="fa fa-key pull-right"></i>Ganti Password</a></li>
                    <li><a href="<?= base_url("admin/profile") ?>"><i class="fa fa-user pull-right"></i>Profil</a></li>
                    <li><a href="<?= base_url("admin/login/logout") ?>"><i class="fa fa-sign-out pull-right"></i>Keluar</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="ts-main-content">
        <nav class="ts-sidebar">
            <ul class="ts-sidebar-menu">
                <li class="ts-label">Main</li>
                <li><a href="<?= base_url("admin/dashboard") ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-exchange"></i> Sewa</a>
                    <ul class="ts-sidebar-menu">
                        <li><a href="<?= base_url("admin/pembayaran") ?>">Menunggu Pembayaran</a></li>
                        <li><a href="<?= base_url("admin/konfirmasi") ?>">Menunggu Konfirmasi</a></li>
                        <li><a href="<?= base_url("admin/pengembalian") ?>">Pengembalian</a></li>
                        <li><a href="<?= base_url("admin/data_sewa") ?>">Data Sewa</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-cart-plus"></i> Baju</a>
                    <ul class="ts-sidebar-menu">
                        <li><a href="<?= base_url("admin/jenis") ?>">Data Jenis</a></li>
                        <li><a href="<?= base_url("admin/kategori") ?>">Data Kategori</a></li>
                        <li><a href="<?= base_url("admin/baju") ?>">Data Baju</a></li>
                    </ul>
                </li>
                <li><a href="<?= base_url("admin/member") ?>"><i class="fa fa-users"></i> Member</a></li>
                <li><a href="<?= base_url("admin/pesan") ?>"><i class="fa fa-phone"></i> Menghubungi</a></li>
                <li><a href="<?= base_url("admin/halaman") ?>"><i class="fa fa-gear"></i> Kelola Halaman</a></li>
                <li><a href="<?= base_url("admin/kontak") ?>"><i class="fa fa-info"></i> &nbsp;&nbsp;Kontak Info</a></li>
                <li><a href="<?= base_url("admin/laporan") ?>"><i class="fa fa-files-o"></i> Laporan</a></li>
            </ul>
        </nav>
        <?= $this->renderSection("content") ?>

    </div>

    <!-- Loading Scripts -->
    <script src="<?= base_url("admin_assets/js/jquery.min.js") ?>"></script>
    <script src="<?= base_url("admin_assets/js/bootstrap-select.min.js") ?>"></script>
    <script src="<?= base_url("admin_assets/js/bootstrap.min.js") ?>"></script>
    <script src="<?= base_url("admin_assets/js/jquery.dataTables.min.js") ?>"></script>
    <script src="<?= base_url("admin_assets/js/dataTables.bootstrap.min.js") ?>"></script>
    <script src="<?= base_url("admin_assets/js/Chart.min.js") ?>"></script>
    <script src="<?= base_url("admin_assets/js/fileinput.js") ?>"></script>
    <script src="<?= base_url("admin_assets/js/chartData.js") ?>"></script>
    <script src="<?= base_url("admin_assets/js/main.js") ?>"></script>

    <script>

    </script>
</body>

</html>