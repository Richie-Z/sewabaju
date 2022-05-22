<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php helper("bantu") ?>
<section id="listing_img_slider">
    <div><img src="<?= base_url("admin_assets/img/baju/" . $baju["gambar1"]) ?>" class="img-responsive" alt="image" width="900" height="560"></div>
    <div><img src="<?= base_url("admin_assets/img/baju/" . $baju["gambar2"]) ?>" class="img-responsive" alt="image" width="900" height="560"></div>
    <div><img src="<?= base_url("admin_assets/img/baju/" . $baju["gambar3"]) ?>" class="img-responsive" alt="image" width="900" height="560"></div>
</section>
<!--Listing-detail-->
<section class="listing-detail">
    <div class="container">
        <div class="listing_detail_head row">
            <div class="col-md-9">
                <h2><?= $baju["nama_baju"] ?></h2>
            </div>
            <div class="col-md-3">
                <div class="price_info">
                    <p><?= format_rupiah($baju["harga"]); ?> </p>/ 3 Hari
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="main_features">
                </div>
                <div class="listing_more_info">
                    <div class="listing_detail_wrap">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs gray-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Deskripisi Baju</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- vehicle-overview -->
                            <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                                <p><?= $baju["deskripsi"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Side-Bar-->
            <aside class="col-md-3">
                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-envelope" aria-hidden="true"></i>Sewa Sekarang</h5>
                    </div>

                    <?php if (session()->get("isLogin")) { ?>
                        <div class="form-group" align="center">
                            <a href="<?= base_url("booking/" . $baju["id_baju"]) ?>" class="btn" align="center">Sewa Sekarang</a>
                        </div>
                    <?php } else { ?>
                        <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login Untuk Menyewa</a>

                    <?php } ?>
                </div>
                <div class="share_vehicle">
                    <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
                    <!--/Side-Bar-->
                </div>

            </aside>
        </div>



        <div class="space-20"></div>
        <div class="divider"></div>
        <!--Similar-Cars-->
        <div class="similar_cars">
            <h3>Baju Lainnya</h3>
            <div class="row">
                <?php foreach ($jenis->getResult() as $j) { ?>
                    <div class="col-md-3 grid_listing">
                        <div class="product-listing-m gray-bg">
                            <div class="product-listing-img"> <a href="<?= base_url("booking/" . $baju["id_baju"]) ?>"><img src="admin/img/baju/<?= $j->gambar1 ?>" class="img-responsive" alt="image" /> </a>
                            </div>
                            <div class="product-listing-content">
                                <h5><a href="<?= base_url("booking/" . $baju["id_baju"]) ?>"><?= $j->nama_baju ?></a></h5>
                                <p class="list-price"><?= format_rupiah($j->harga); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!--/Similar-Cars-->

    </div>


    </div>
</section>
<!--/Listing-detail-->
<?= $this->endSection() ?>