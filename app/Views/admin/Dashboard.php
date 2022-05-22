<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu") ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Dashboard</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-info text-light">
                                        <div class="stat-panel text-center">
                                            <div class="stat-panel-number h1 "><?= $menungguBayar; ?></div>
                                            <div class="stat-panel-title text-uppercase">Menunggu Pembayaran</div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url("admin/pembayaran") ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-success text-light">
                                        <div class="stat-panel text-center">
                                            <div class="stat-panel-number h1 "><?= ($menungguKonfirm); ?></div>
                                            <div class="stat-panel-title text-uppercase">Menunggu Konfirmasi</div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url("admin/konfirmasi") ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-info text-light">
                                        <div class="stat-panel text-center">
                                            <div class="stat-panel-number h1 "><?= ($belumDikembalikan); ?></div>
                                            <div class="stat-panel-title text-uppercase">Belum Dikembalikan</div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url("admin/pengembalian") ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-warning text-light">
                                        <div class="stat-panel text-center">
                                            <div class="stat-panel-number h1 "><?= ($jenis); ?></div>
                                            <div class="stat-panel-title text-uppercase">Total Jenis Baju</div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url("admin/jenis") ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-success text-light">
                                        <div class="stat-panel text-center">
                                            <div class="stat-panel-number h1 "><?= ($baju); ?></div>
                                            <div class="stat-panel-title text-uppercase">Jumlah Baju</div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url("admin/baju") ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-warning text-light">
                                        <div class="stat-panel text-center">
                                            <div class="stat-panel-number h1 "><?= ($sewa); ?></div>
                                            <div class="stat-panel-title text-uppercase">Total Sewa</div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url("admin/data_sewa") ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-primary text-light">
                                        <div class="stat-panel text-center">
                                            <div class="stat-panel-number h1 "><?= ($member); ?></div>
                                            <div class="stat-panel-title text-uppercase">Jumlah Member</div>
                                        </div>
                                    </div>
                                    <a href="..<?= base_url("admin/member") ?>" class="block-anchor panel-footer text-center">Rincian <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body bk-success text-light">
                                        <div class="stat-panel text-center">
                                            <div class="stat-panel-number h1 "><?= ($pesan); ?></div>
                                            <div class="stat-panel-title text-uppercase">Menghubungi</div>
                                        </div>
                                    </div>
                                    <a href="..<?= base_url("admin/pesan") ?>" class="block-anchor panel-footer text-center">Rincian &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>