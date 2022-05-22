<?php
if (session()->getFlashdata("login")) {
    echo session()->getFlashdata("login");
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Sistem Penyewaan Baju Berbasis Web</title>
    <link rel="shortcut icon" href="img/fav.png">
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/dataTables.bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/bootstrap-social.css")?>">
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/bootstrap-select.css")?>">
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/fileinput.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/awesome-bootstrap-checkbox.css")?>">
    <link rel="stylesheet" href="<?= base_url("admin_assets/css/style.css")?>">
</head>

<body>

    <div class="login-page bk-img" style="background-image: url(<?= base_url("admin_assets/img/login-bg.jpg")?>);">
        <div class="form-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
                        <div class="well row pt-2x pb-3x bk-light">
                            <div class="col-md-8 col-md-offset-2">
                                <form method="post" action="<?= base_url("admin/login/login") ?>">
                                    <label for="" class="text-uppercase text-sm">Username </label>
                                    <input type="text" placeholder="Username" name="username" class="form-control mb">
                                    <label for="" class="text-uppercase text-sm">Password</label>
                                    <input type="password" placeholder="Password" name="password" class="form-control mb">
                                    <button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="<?= base_url("admin_assets/js/jquery.min.js")?>"></script>
    <script src="<?= base_url("admin_assets/js/bootstrap-select.min.js")?>"></script>
    <script src="<?= base_url("admin_assets/js/bootstrap.min.js")?>"></script>
    <script src="<?= base_url("admin_assets/js/jquery.dataTables.min.js")?>"></script>
    <script src="<?= base_url("admin_assets/js/dataTables.bootstrap.min.js")?>"></script>
    <script src="<?= base_url("admin_assets/js/Chart.min.js")?>"></script>
    <script src="<?= base_url("admin_assets/js/fileinput.js")?>"></script>
    <script src="<?= base_url("admin_assets/js/chartData.js")?>"></script>
    <script src="<?= base_url("admin_assets/js/main.js")?>"></script>

</body>

</html>