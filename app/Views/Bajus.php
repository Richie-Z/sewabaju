<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
helper('form');  ?>
<!--Page Header-->
<section class="page-header listing_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1><?= $message ?></h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="#">Home</a></li>
                <li><?= $message ?></li>
            </ul>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->

<!--Listing-->
<section class="listing-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="result-sorting-wrapper">
                    <div class="sorting-count">
                        <p><span><?= $baju->get()->getNumRows() ?> Items</span></p>
                    </div>
                </div>

                <?php foreach ($baju->get()->getResult() as $row) { ?>
                    <div class="product-listing-m gray-bg">
                        <div class="product-listing-img"><img src="admin/img/baju/<?= $row->gambar1 ?>" class="img-responsive" alt="Image" /> </a>
                        </div>
                        <div class="product-listing-content">
                            <h5><a href="baju_details.php?id=<?= $row->id_baju ?>"><?= $row->nama_baju ?></a></h5>
                            <p class="list-price"><?= format_rupiah($row->harga); ?> / Hari</p>
                            <a href="baju_details.php?id=<?= $row->id_baju ?>" class="btn">Lihat Detail <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!--Side-Bar-->
            <aside class="col-md-3 col-md-pull-9">
                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-filter" aria-hidden="true"></i>Kategori</h5>
                    </div>
                    <div class="sidebar_filter">
                        <?= form_open(base_url("baju/cariKategori")) ?>
                        <div class="form-group select">
                            <input type="hidden" name="id_jenis" value="<?= $jenis->id_jenis ?>">
                            <select class="form-control" name="kategori" required>
                                <option value="" selected>Pilih Kategori</option>
                                <?php foreach ($kategori->getResult() as $k) { ?>
                                    <option value="<?= $k->id_kategori ?>"><?= $k->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i>Cari</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>

                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-clothes" aria-hidden="true"></i>Baju Terbaru</h5>
                    </div>
                    <div class="recent_addedcars">
                        <ul>
                            <?php foreach ($baju->get(5)->getResult() as $row) { ?>
                                <li class="gray-bg">
                                    <div class="recent_post_img"> <a href="baju_details.php?id=<?= $row->id_baju ?>"><img src="admin/img/baju/<?= $row->gambar1 ?>" alt="image"></a> </div>
                                    <div class="recent_post_title"> <a href="baju_details.php?id=<?= $row->id_baju ?>"><?= $row->nama_baju ?></a>
                                        <p class="widget_price"><?= format_rupiah($row->harga); ?> / Hari</p>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </aside>
            <!--/Side-Bar-->
        </div>
    </div>
</section>
<!-- /Listing-->
<?= $this->endSection() ?>