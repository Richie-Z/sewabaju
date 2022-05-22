<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<script type="text/javascript">
    function valid(theform) {
        pola_nama = /^[a-zA-Z]*$/;
        if (!pola_nama.test(theform.brand.value)) {
            alert('Hanya huruf yang diperbolehkan untuk Nama!');
            theform.brand.focus();
            return false;
        }
        return (true);
    }
</script>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title">Tambah Kategori</h2>

                <div class="row">
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">Form Tambah Kategori</div>
                            <div class="panel-body">
                                <form id="theform" name="theform" method="post" class="form-horizontal" action="<?= base_url("admin/kategori/simpan") ?>" onSubmit="return valid(this);">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Kategori</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="kategori" id="kategori" required>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-4">
                                            <button class="btn btn-primary" type="submit">Tambah</button>
                                            <a href="<?= base_url("admin/kategori") ?>" class="btn btn-default">Batal</a>
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