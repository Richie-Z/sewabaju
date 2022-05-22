<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php $session = \Config\Services::session();
helper('form'); ?>
<!--Contact-us-->
<section class="contact_us section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Ada Pertanyaan? Silahkan Isi Form Berikut:</h3>
                <?php if ($session->getFlashdata("error")) { ?>
                    <div class="errorWrap"><strong>ERROR</strong>:
                        <?= $session->getFlashdata("error"); ?> </div>
                <?php } else if ($session->getFlashdata("message")) { ?>
                    <div class="succWrap"><strong>SUCCESS</strong>:<?= $session->getFlashdata("message"); ?>
                    </div>
                <?php } ?>
                <div class="contact_form gray-bg">
                    <?= form_open("home/postContactUs") ?>
                    <div class="form-group">
                        <label class="control-label">Nama <span>*</span></label>
                        <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email <span>*</span></label>
                        <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">No. Hp <span>*</span></label>
                        <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Pesan <span>*</span></label>
                        <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit" name="send" type="submit">Kirim <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Info Kontak</h3>
                <div class="contact_detail">
                    <?php foreach ($contact->getResult() as $row) { ?>
                        <ul>
                            <li>
                                <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <div class="contact_info_m"><?= $row->alamat_kami ?></div>
                            </li>
                            <li>
                                <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <div class="contact_info_m"><a href=""><?= $row->telp_kami ?></a></div>
                            </li>
                            <li>
                                <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                <div class="contact_info_m"><a href=""><?= $row->email_kami ?></a></div>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Contact-us-->

<?= $this->endSection() ?>