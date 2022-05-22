<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session() ?>
<script type="text/javascript">
    function checkLetter(theform) {
        pola_nama = /^[a-zA-Z .]*$/;
        if (!pola_nama.test(theform.fullname.value)) {
            alert('Hanya huruf yang diperbolehkan untuk Nama!');
            theform.fullname.focus();
            return false;
        }
        return (true);
    }
</script>
<!--Page Header-->
<section class="page-header profile_page">
    <div class="container">
        <div class="page-header_wrap">
            <div class="page-heading">
                <h1>Profil Anda</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Profile</li>
            </ul>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
</section>
<!-- /Page Header-->
<section class="user_profile inner_pages">
    <div class="container">
        <div class="user_profile_info">

            <div class="col-md-12 col-sm-10">
                <?php
                if ($session->getFlashdata("msg")) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?= ($session->getFlashdata("msg")); ?> </div><?php } ?>
                <form method="post" name="theform" onSubmit="return checkLetter(this);" action="<?= base_url("home/update_profile") ?>">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input class="form-control white_bg" name="fullname" value="<?= ($data->nama_user); ?>" id="fullname" type="text" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat Email</label>
                        <input class="form-control white_bg" value="<?= ($data->email); ?>" name="email" id="email" type="email" required readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telepon</label>
                        <input class="form-control white_bg" name="mobilenumber" value="<?= ($data->telp); ?>" id="phone-number" type="number" min="0" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <textarea class="form-control white_bg" name="address" rows="4"><?= ($data->alamat); ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="updateprofile" class="btn">Simpan Perubahan <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--/Profile-setting-->

<?= $this->endSection() ?>