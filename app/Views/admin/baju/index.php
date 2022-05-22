<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Kelola Data Baju</h2>
                <!-- Zero Configuration Table -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?= base_url("admin/baju/tambah") ?>" class="btn btn-success">Tambah</a>
                    </div>
                    <div class="panel-body">
                        <?php if ($session->getFlashdata("pesan")) { ?><div class="errorWrap"><strong>Pesan : </strong>:<?= ($session->getFlashdata("pesan")); ?> </div><?php } ?>

                        <div class="table-responsive">
                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Baju</th>
                                        <th>Jenis</th>
                                        <th>Kategori</th>
                                        <th>Harga / 3 Hari</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($data->getResult() as $row) {
                                        $nomor++;
                                    ?>
                                        <tr>
                                            <td><?= ($nomor); ?></td>
                                            <td><?= ($row->nama_baju); ?></td>
                                            <td><?= ($row->nama_jenis); ?></td>
                                            <td><?= ($row->nama); ?></td>
                                            <td><?php echo format_rupiah($row->harga); ?></td>
                                            <td align="center">
                                                <a href="<?= base_url("admin/baju/detail/" . $row->id_baju); ?>" class="btn btn-primary btn-xs">&nbsp;&nbsp;Detail&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                                <a href="<?= base_url("admin/baju/edit/" . $row->id_baju); ?>" class="btn btn-warning btn-xs">&nbsp;&nbsp;Ubah&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                                <a href="<?= base_url("admin/baju/hapus/" . $row->id_baju); ?>" onclick="return confirm('Apakah anda yakin akan menghapus <b><?php echo $row->nama_baju; ?></b>?');" class="btn btn-danger btn-xs">&nbsp;&nbsp;Hapus&nbsp;&nbsp;</a>
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