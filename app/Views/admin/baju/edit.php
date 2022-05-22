<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<script type="text/javascript">
    function valid(theform) {
        pola_nama = /^[a-zA-Z]*$/;
        if (!pola_nama.test(theform.vehicletitle.value)) {
            alert('Hanya huruf yang diperbolehkan untuk Nama Baju!');
            theform.vehicletitle.focus();
            return false;
        }
        return (true);
    }
</script>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title">Edit Data Baju</h2>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Form Detail Data Baju</div>
                            <div class="panel-body">
                                <form method="post" class="form-horizontal" name="theform" action="<?= base_url("admin/baju/edit") ?>" onsubmit="return valid(this);" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Baju<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="hidden" name="id" class="form-control" value="<?php echo $data->id_baju; ?>" required>
                                            <input type="text" name="nama" class="form-control" value="<?= $data->nama_baju; ?>">
                                        </div>
                                        <label class="col-sm-2 control-label">Jenis Baju<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="jenis" required="" data-parsley-error-message="Field ini harus diisi">
                                                <option value="">== Pilih Jenis ==</option>
                                                <?php foreach ($jenis->getResult() as $row) { ?>
                                                    <option value='<?= $row->id_jenis ?>' <?= $row->id_jenis == $data->id_jenis ?: "selected" ?>><?= $row->nama_jenis ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Deskripsi<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" name="deskripsi" rows="3"><?= $data->deskripsi; ?></textarea>
                                        </div>
                                        <label class="col-sm-2 control-label">Kategori<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="kategori" required>
                                                <option value=""> == Pilih Kategori == </option>
                                                <?php foreach ($kategori->getResult() as $row) { ?>
                                                    <option value='<?= $row->id_kategori ?>' <?= $row->id_kategori == $data->id_kategori ?: "selected" ?>><?= $row->nama ?> </option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Harga /Hari<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" name="harga" class="form-control" value="<?php echo ($data->harga); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <h5 align="center"><b>Stok Ukuran</b></h5>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">S<span style="color:red">*</span></label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" name="s" class="form-control" value="<?= $data->s; ?>">
                                        </div>
                                        <label class="col-sm-1 control-label">M<span style="color:red">*</span></label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" name="m" class="form-control" value="<?= $data->m; ?>">
                                        </div>
                                        <label class="col-sm-1 control-label">L<span style="color:red">*</span></label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" name="l" class="form-control" value="<?= $data->l; ?>">
                                        </div>
                                        <label class="col-sm-1 control-label">XL<span style="color:red">*</span></label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" name="xl" class="form-control" value="<?= $data->xl; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <h4 align="center"><b>Gambar Baju</b></h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            Gambar 1<input type="file" name="img1" accept="image/*">
                                            <img src="<?= base_url("admin_assets/img/baju/" . $data->gambar1); ?>" width="300" height="200" style="border:solid 1px #000"></center>
                                        </div>
                                        <div class="col-sm-4">
                                            Gambar 2<input type="file" name="img2" accept="image/*">
                                            <img src="<?= base_url("admin_assets/img/baju/" . $data->gambar2); ?>" width="300" height="200" style="border:solid 1px #000"></center>
                                        </div>
                                        <div class="col-sm-4">
                                            Gambar 3<input type="file" name="img3" accept="image/*">
                                            <img src="<?= base_url("admin_assets/img/baju/" . $data->gambar3); ?>" width="300" height="200" style="border:solid 1px #000">
                                            <center>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <div class="checkbox checkbox-inline">
                                            <button class="btn btn-primary" type="submit">Simpan</button>

                                            <a href="<?= base_url("admin/baju") ?>" class="btn btn-default">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </form>

    </div>
</div>
<?= $this->endSection() ?>