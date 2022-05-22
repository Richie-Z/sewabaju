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

                <h2 class="page-title">Ubah Password</h2>

                <div class="row">
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">Form Ubah Password</div>
                            <div class="panel-body">
                                <form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();" action="<?= base_url("admin/login/update_password") ?>">
                                    <?php if ($session->getFlashdata("msg")) { ?><?= ($session->getFlashdata("msg")); ?><?php } ?>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Current Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password" id="password" required>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">New Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
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