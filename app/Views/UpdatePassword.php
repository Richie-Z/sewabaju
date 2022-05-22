<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php $session = \Config\Services::session();
helper('form');
if ($session->getFlashdata("msg"))
    echo $session->getFlashdata("msg")
?>
<section class="user_profile inner_pages">
    <div class="container">
        <div class="user_profile_info">
            <div class="col-md-12 col-sm-10">
                <?= form_open(base_url("home/update_password")) ?>
                <div class="form-group">
                    <label class="control-label">Password Sekarang</label>
                    <input class="form-control white_bg" name="pass" id="pass" type="password" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Password Baru</label>
                    <input class="form-control white_bg" name="new" id="new" type="password" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Konfirmasi Password</label>
                    <input class="form-control white_bg" name="confirm" id="confirm" type="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Update Password <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>