<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<script type="text/javascript">
    function valid() {
        if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
            alert("New Password and Confirm Password Field do not match!");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
<style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
</style>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Profile</h2>
                <div class="row">
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">Update Profile</div>
                            <div class="panel-body">
                                <form method="post" name="chngprfl" class="form-horizontal" onSubmit="return valid();" enctype="multipart/form-data" action="<?= base_url("admin/login/update_profile") ?>">
                                    <?php if ($session->getFlashdata("msg")) { ?><div class="errorWrap"><strong>Pesan : </strong>:<?= ($session->getFlashdata("msg")); ?> </div><?php } ?>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $session->get('name') ?>" required>
                                            <input type="hidden" class="form-control" name="oldimage" id="oldimage" value="<?= $session->get('image'); ?>" required>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Foto</label>
                                        <div class="col-sm-8">
                                            <img src="../admin_assets/img/<?= $session->get('image') ?>" width="100px">
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Ganti Foto</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" name="image" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-4">
                                            <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
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