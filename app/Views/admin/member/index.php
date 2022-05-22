<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Member</h2>
                <!-- Zero Configuration Table -->
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Member</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Alamat</th>
                                        <th>Opsi</th>
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
                                            <td><?= $row->nama_user; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->telp; ?></td>
                                            <td><?= $row->alamat; ?></td>
                                            <td align='center'>
                                                <a href="#myModal" data-toggle="modal" data-load-code="<?php echo $row->id_user ?>" data-remote-target="#myModal .modal-body" class="btn btn-primary btn-xs">Detail</a>
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
            $($this.data('remote-target')).load('<?= base_url("admin/member/detail/") ?>/' + code);
            app.code = code;

        }
    });
</script>
<?= $this->endSection() ?>