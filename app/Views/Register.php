<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>

<?php $session = \Config\Services::session();
if ($session->getFlashdata("register")) echo $session->getFlashdata('register');
?>
<script type="text/javascript">
    function checkLetter(theform) {
        pola_nama = /^[a-zA-Z .]*$/;
        if (!pola_nama.test(theform.fullname.value)) {
            alert('Hanya huruf yang diperbolehkan untuk Nama!');
            theform.fullname.focus();
            return false;
        }

        if (theform.pass.value != thform.conf.value) {
            alert("New Password and Confirm Password Field do not match!");
            theform.conf.focus();
            return false;
        }
        return (true);
    }
</script>

<script type="text/javascript">
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "register/check_availability",
            data: 'emailid=' + $("#emailid").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>


<section class="user_profile inner_pages">
    <div class="container">
        <div class="user_profile_info">
            <h6 align="center">Registrasi Member</h6>
            <div class="col-md-12 col-sm-10">
                <form method="post" name="theform" action="register/regist" id="theform" onSubmit="return checkLetter(this);" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required="required">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="mobileno" placeholder="Nomer Telepon" minlength="10" maxlength="15" required="required">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Alamat Email" required="required">
                        <span id="user-availability-status" style="font-size:12px;"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="conf" name="conf" placeholder="Konfirmasi Password" required="required">
                    </div>
                    <div class="form-group checkbox">
                        <input type="checkbox" id="terms_agree" required="required" checked="">
                        <label for="terms_agree">Saya Setuju dengan <a href="#">Syarat dan Ketentuan yang berlaku</a></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sign Up" class="btn btn-block">
                    </div>
                </form>
                <div class="modal-footer text-center">
                    <p>Sudah punya akun? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Disini</a></p>
                </div>

            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>