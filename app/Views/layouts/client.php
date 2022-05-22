<?php
$jenisBaju = model("App\Models\Jenis")->get();
$session = session();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Sistem Penyewaan Baju Berbasis Web</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("assets/css/owl.carousel.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("assets/css/owl.transitions.css") ?>" type="text/css">
    <link href="<?= base_url("assets/css/slick.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/css/bootstrap-slider.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/css/font-awesome.min.css") ?>" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="<?= base_url("assets/switcher/css/switcher.css") ?>" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url("assets/switcher/css/red.css") ?>" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url("assets/switcher/css/orange.css") ?>" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url("assets/switcher/css/blue.css") ?>" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url("assets/switcher/css/pink.css") ?>" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url("assets/switcher/css/green.css") ?>" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="<?= base_url("assets/switcher/css/purple.css") ?>" title="purple" media="all" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url("assets/images/favicon-icon/apple-touch-icon-144-precomposed.png") ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url("assets/images/favicon-icon/apple-touch-icon-114-precomposed.html") ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url("assets/images/favicon-icon/apple-touch-icon-72-precomposed.png") ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url("assets/images/favicon-icon/apple-touch-icon-57-precomposed.png") ?>">
    <link rel="shortcut icon" href="<?= base_url("assets/images/fav.png") ?>">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="demo-icon customBgColor"><i class="fa fa-cog fa-spin fa-2x"></i></div>
            <div class="form_holder">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="predefined_styles">
                            <div class="skin-theme-switcher">
                                <h4>Color</h4>
                                <a href="#" data-switchcolor="red" class="styleswitch" style="background-color:#de302f;"> </a>
                                <a href="#" data-switchcolor="orange" class="styleswitch" style="background-color:#f76d2b;"> </a>
                                <a href="#" data-switchcolor="blue" class="styleswitch" style="background-color:#228dcb;"> </a>
                                <a href="#" data-switchcolor="pink" class="styleswitch" style="background-color:#FF2761;"> </a>
                                <a href="#" data-switchcolor="green" class="styleswitch" style="background-color:#2dcc70;"> </a>
                                <a href="#" data-switchcolor="purple" class="styleswitch" style="background-color:#6054c2;"> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Header -->
    <header>
        <div class="default-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3">
                        <div class="logo"><a href="<?= base_url() ?>"><img src="<?= base_url("assets/images/icon.png") ?>" width="120px" height="110px" alt="image" /></a> </div>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <div class="header_info">
                            <div class="header_widgets">
                                <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                                <p class="uppercase_text">E-mail : </p>
                                <a href="">betangcollection@gmail.com</a>
                            </div>
                            <div class="header_widgets">
                                <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                                <p class="uppercase_text">Telp : </p>
                                <a href="tel:+62812-3636-6860">+62 821-5860-9596</a>
                            </div>
                            <?php if (!$session->get("isLogin")) {
                            ?>
                                <div class="login_btn">
                                    <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav id="navigation_bar" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <?php if ($session->get("isLogin")) { ?>
                    <div class="header_wrap">
                        <div class="user_login">
                            <ul>
                                <li class="dropdown" bgcolor="blue"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                        <?= $session->get("nama_user") ?>
                                        <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url("profile") ?>">Profile Settings</a></li>
                                        <li><a href="<?= base_url("update_password") ?>">Update Password</a></li>
                                        <li><a href="<?= base_url("booking/riwayat") ?>">Riwayat Sewa</a></li>
                                        <li><a href="<?= base_url("home/logout") ?>">Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>

                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li class="dropdown" bgcolor="blue"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jenis Baju</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($jenisBaju->getResult() as $row) { ?>
                                    <li><a href="<?= base_url("jenis_baju/$row->id_jenis") ?>"><?= $row->nama_jenis ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="<?= base_url("page/faqs") ?>">FAQs</a></li>
                        <li><a href="<?= base_url("page/aboutus") ?>">Tentang Kami</a></li>
                        <li><a href="<?= base_url("contact_us") ?>">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navigation end -->

    </header>
    <!--/Header -->

    <?= $this->renderSection("content") ?>

    <!--Footer -->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <h6>Tentang Kami</h6>
                        <ul>
                            <li><a href="<?= base_url("page/aboutus") ?>">Tentang Kami</a></li>
                            <li><a href="<?= base_url("page/faqs") ?>">FAQs</a></li>
                            <li><a href="<?= base_url("page/privacy") ?>">Privacy</a></li>
                            <li><a href="<?= base_url("page/terms") ?>">Terms of use</a></li>
                            <li><a href="<?= base_url("admin") ?>">Admin Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-6 text-right">
                        <div class="footer_widget">
                            <p>Connect with Us:</p>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-pull-6">
                        <p class="copy-right">&copy;2022 Sistem Informasi Penyewaan Baju Berbasis Web. <br>Distributed by <a href="" target="_blank" rel="noopener noreferrer">BetangCollection </a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer-->

    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!--/Back to top-->

    <!--Login-Form -->
    <?php helper('form'); ?>
    <div class="modal fade" id="loginform">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Login</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="login_wrap">
                            <div class="col-md-12 col-sm-6">
                                <?= form_open(base_url("home/login")) ?>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="remember">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" value="Login" class="btn btn-block">
                                </div>
                                <?= form_close() ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <p>Belum punya akun? <a href="<?= base_url("register") ?>">Daftar Disini</a></p>
                    <!--<p>Lupa Password? <a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Klik disini</a></p>-->
                </div>
            </div>
        </div>
    </div>
    <!--/Login-Form -->

    <!--Forgot-password-Form -->
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("New Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <div class="modal fade" id="forgotpassword">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Password Recovery</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="forgotpassword_wrap">
                            <div class="col-md-12">
                                <form name="chngpwd" method="post" onSubmit="return valid();">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email address*" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" min="0" name="mobile" class="form-control" placeholder="Your Reg. Phone Number*" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="newpassword" class="form-control" placeholder="New Password*" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password*" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Reset My Password" name="update" class="btn btn-block">
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p class="gray_text">For security reasons we don't store your password. Your password will be reset and a new one will be send.</p>
                                    <p><a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Forgot-password-Form -->

    <!-- Scripts -->
    <script src="<?= base_url("assets/js/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/bootstrap.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/interface.js") ?>"></script>
    <!--Switcher-->
    <script src="<?= base_url("assets/switcher/js/switcher.js") ?>"></script>
    <!--bootstrap-slider-JS-->
    <script src="<?= base_url("assets/js/bootstrap-slider.min.js") ?>"></script>
    <!--Slider-JS-->
    <script src="<?= base_url("assets/js/slick.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/owl.carousel.min.js") ?>"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->

</html>