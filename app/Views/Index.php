<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>

<?php $session = \Config\Services::session();
if ($session->getFlashdata("register"))
    echo "<script>alert('Sukses Register');</script>";
if ($session->getFlashdata("login")) {
    echo $session->getFlashdata("login");
}
?>
<!-- Banners -->
<section id="banner" class="banner-section">
    <div class="container">
        <div class="div_zindex">
            <div class="row">
                <div class="col-md-5 col-md-push-7">
                    <div class="banner_content">
                        <h1>Cari Baju untuk acara spesial anda?</h1>
                        <p>Kami Punya beberapa pilihan untuk anda. </p>
                        <a href="<?= base_url("jenis_baju/1") ?>" class="btn">Selengkapnya <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Banners -->


<!-- Resent Cat-->
<section class="section-padding gray-bg">
    <div class="container">
        <div class="row">

            <!-- Nav tabs -->
            <div class="recent-tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">Sewa Sekarang!</a></li>
                </ul>
            </div>
            <!-- Recently Listed New Cars -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="resentnewcar">
                    <?php if (count($baju->getResult()) >  0) {
                        helper("bantu");
                        foreach ($baju->getResult() as $row) { ?>
                            <div class="col-list-3">
                                <div class="recent-car-list">
                                    <div class="car-info-box">
                                        <a href="baju/<?= $row->id_baju ?>"><img src="<?= base_url("admin_assets/img/baju/" . $row->gambar1) ?>" class="img-responsive" alt="image"></a>
                                    </div>
                                    <div class="car-title-m">
                                        <h6><a href="baju/<?= $row->id_baju ?>" align='center'><?= $row->nama_baju ?></a></h6>
                                        <span class="price"><?= (format_rupiah($row->harga)); ?> / 3 Hari</span>
                                    </div>
                                    <div class="inventory_info_m">
                                        <p><?= substr($row->deskripsi, 0, 70); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    <?php } else { ?>
                        <div class="col-list-3">
                            <h1>Kosong</h1>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
</section>
<!-- /Resent Cat -->
<?= $this->endSection() ?>