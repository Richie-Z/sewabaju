<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title">Menghubungi</h2>

                <!-- Zero Configuration Table -->
                <div class="panel panel-default">
                    <div class="panel-heading">Data</div>
                    <div class="panel-body">
                        <?php if ($session->getFlashdata("pesan")) { ?><div class="errorWrap"><strong>Pesan : </strong>:<?= ($session->getFlashdata("pesan")); ?> </div><?php } ?>

                        <div class="table-responsive">
                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Pesan</th>
                                        <th>Tgl. Posting</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 0;
                                    foreach ($data->getResult() as $row) {
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?= $row->nama_visit; ?></td>
                                            <td><?= $row->email_visit; ?></td>
                                            <td><?= $row->telp_visit; ?></td>
                                            <td><?= $row->pesan; ?></td>
                                            <td><?= $row->tgl_posting; ?></td>
                                            <?php if ($row->status == 1) { ?>
                                                <td>Sudah Dibaca</td><?php } else { ?>
                                                <td><a href="<?= base_url("admin/pesan/baca/" . $row->id_cu) ?>" onclick="return confirm('Tandai sudah dibaca?')">Baca</a></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>