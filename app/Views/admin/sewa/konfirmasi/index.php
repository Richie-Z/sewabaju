<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title">Sewa Menunggu Konfirmasi</h2>

                <!-- Zero Configuration Table -->
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Sewa Menunggu Konfirmasi</div>
                    <div class="panel-body">
                        <?php if ($session->getFlashdata("pesan")) { ?><div class="errorWrap"><strong>Pesan : </strong>:<?= ($session->getFlashdata("pesan")); ?> </div><?php } ?>

                        <div class="table-responsive">
                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Kode Sewa</th>
                                        <th>Baju </th>
                                        <th>Tgl. Mulai</th>
                                        <th>Tgl. Selesai</th>
                                        <th>Total</th>
                                        <th>Penyewa</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($data->getResult() as $row) {
                                        $total = $row->durasi * ($row->harga / 3);
                                        $i++;
                                    ?>
                                        <tr align="center">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo htmlentities($row->id_booking); ?></td>
                                            <td><?php echo htmlentities($row->nama_baju); ?></td>
                                            <td><?php echo IndonesiaTgl(htmlentities($row->tgl_mulai)); ?></td>
                                            <td><?php echo IndonesiaTgl(htmlentities($row->tgl_selesai)); ?></td>
                                            <td><?php echo format_rupiah(htmlentities($total)); ?></td>
                                            <td><a href="#myModal" data-toggle="modal" data-load-id="<?php echo $row->id_user; ?>" data-remote-target="#myModal .modal-body"><?php echo $row->nama_user; ?></a></td>
                                            <td><?php echo htmlentities($row->status); ?></td>
                                            <td>
                                                <a href="#myModal" data-toggle="modal" data-load-code="<?php echo $row->id_booking; ?>" data-remote-target="#myModal .modal-body"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;&nbsp;
                                                <a href="<?php echo base_url("admin/konfirmasi/edit/" . $row->id_booking); ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Large modal -->
                        <div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>One fine body…</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Large modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url("admin_assets/js/jquery.min.js") ?>"></script>

<script>
    var app = {
        code: '0'
    };
    $('[data-load-code]').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var code = $this.data('load-code');
        if (code) {
            $($this.data('remote-target')).load('<?= base_url("admin/sewa/detail/") ?>/' + code);
            app.code = code;

        }
    });
    $('[data-load-id]').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var code = $this.data('load-id');
        if (code) {
            $($this.data('remote-target')).load('<?= base_url("admin/member/detail/") ?>/' + code);
            app.code = code;

        }
    });
</script>
<?= $this->endSection() ?>