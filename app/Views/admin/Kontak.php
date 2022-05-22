<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Update Contact Info</h2>
                <div class="row">
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">Form Kelola Info Kontak</div>
                            <div class="panel-body">
                                <form method="post" name="chngpwd" action="<?= base_url("admin/kontak/update") ?>" class="form-horizontal" onSubmit="return valid();">
                                    <?php if ($session->getFlashdata("pesan")) { ?><div class="errorWrap"><strong>Pesan : </strong>:<?= ($session->getFlashdata("pesan")); ?> </div><?php } ?>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="address" id="address" required><?php echo htmlentities($data->alamat_kami); ?></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_info" value="<?= $data->id_info ?>">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlentities($data->email_kami); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"> Telepon </label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" value="<?php echo htmlentities($data->telp_kami); ?>" name="contactno" id="contactno" required>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-4">
                                            <button class="btn btn-primary" name="submit" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>