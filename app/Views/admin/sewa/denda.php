<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">
                    <center>Denda</center>
                </h2>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if ($session->getFlashdata("pesan")) { ?><div class="errorWrap"><strong>Pesan : </strong>:<?= ($session->getFlashdata("pesan")); ?> </div><?php } ?>

                            <div class="panel panel-default">
                                <div class="panel-body bk-warning text-light">
                                    <div class="stat-panel text-center">
                                        <div class="stat-panel-title text-uppercase">Denda Anda Adalah</div>
                                        <div class="stat-panel-number h1 "><?php echo format_rupiah($denda); ?></div>
                                    </div>
                                </div>
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