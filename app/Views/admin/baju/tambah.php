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
                <h2 class="page-title">Tambah Data Baju</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Form Tambah Data Baju</div>
                            <div class="panel-body">
                                <form method="post" name="theform" action="<?= base_url("admin/baju/store") ?>" class="form-horizontal" onsubmit="return valid(this);" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nama Baju<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="nama" class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label">Jenis Baju<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="jenis" required="" data-parsley-error-message="Field ini harus diisi">
                                                <option value="">== Pilih Jenis ==</option>
                                                <?php foreach ($jenis->getResult() as $row) { ?>
                                                    <option value='<?= $row->id_jenis ?>'><?= $row->nama_jenis ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Deskripsi Baju<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                                        </div>
                                        <label class="col-sm-2 control-label">Kategori<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="kategori" required>
                                                <option value=""> == Pilih Kategori == </option>
                                                <?php foreach ($kategori->getResult() as $row) { ?>
                                                    <option value='<?= $row->id_kategori ?>'><?= $row->nama ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Harga / 3 Hari<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" min="0" name="harga" class="form-control" required>
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
                                            <input type="number" min="0" name="s" class="form-control" required>
                                        </div>
                                        <label class="col-sm-1 control-label">M<span style="color:red">*</span></label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" name="m" class="form-control" required>
                                        </div>
                                        <label class="col-sm-1 control-label">L<span style="color:red">*</span></label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" name="l" class="form-control" required>
                                        </div>
                                        <label class="col-sm-1 control-label">XL<span style="color:red">*</span></label>
                                        <div class="col-sm-2">
                                            <input type="number" min="0" name="xl" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <h4 align="center"><b>Upload Gambar</b></h4>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            Gambar 1<span style="color:red">*</span><input type="file" name="img1" accept="image/*" required>
                                        </div>
                                        <div class="col-sm-4">
                                            Gambar 2<span style="color:red">*</span><input type="file" name="img2" accept="image/*" required>
                                        </div>
                                        <div class="col-sm-4">
                                            Gambar 3<span style="color:red">*</span><input type="file" name="img3" accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="hr-dashed"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-3">
                                                            <div class="checkbox checkbox-inline">
                                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                                                <a href="<?= base_url("admin/baju") ?>" class="btn btn-default">Batal</a>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>