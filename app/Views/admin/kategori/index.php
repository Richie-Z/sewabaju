<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title">Kelola Data Kategori Baju</h2>

                <!-- Zero Configuration Table -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?= base_url("admin/kategori/tambah") ?>" class="btn btn-success">Tambah</a>
                    </div>
                    <div class="panel-body">
                        <?php if ($session->getFlashdata("pesan")) { ?><div class="errorWrap"><strong>Pesan : </strong>:<?= ($session->getFlashdata("pesan")); ?> </div><?php } ?>

                        <div class="table-responsive">
                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead align="center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $nomor = 0;
                                    foreach ($data->getResult() as $row) {
                                        $nomor++;
                                    ?>
                                        <tr>
                                            <td align="center"><?= ($nomor); ?></td>
                                            <td><?= ($row->nama) ?></td>
                                            <td align="center">
                                                <a href="<?= base_url("admin/kategori/edit/" . $row->id_kategori) ?>" class="btn btn-warning btn-xs">&nbsp;&nbsp;Ubah&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                                <a href="<?= base_url("admin/kategori/hapus/" . $row->id_kategori) ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $row->nama ?>?');" class="btn btn-danger btn-xs">&nbsp;&nbsp;Hapus&nbsp;&nbsp;</a>
                                            </td>
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