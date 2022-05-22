<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <h2 class="page-title">Edit Status Sewa</h2>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Info Penyewa</div>
                            <div class="panel-body">
                                <?php
                                $total = $data->durasi * ($data->harga / 3);

                                ?>

                                <form method="post" class="form-horizontal" name="theform" enctype="multipart/form-data" action="<?= base_url("admin/sewa/status") ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kode Sewa</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="id_booking" class="form-control" value="<?php echo $data->id_booking; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status" required>
                                                <?php
                                                $stt = $data->status;
                                                echo "<option value='$stt' selected>" . strtoupper($stt) . "</option>";
                                                echo "<option value='Cancel'>" . strtoupper("Cancel") . "</option>";
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Penyewa</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="penyewa" class="form-control" value="<?php echo $data->nama_user; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Telepon</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="telp" class="form-control" value="<?php echo $data->telp; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-4">
                                            <textarea col="5" name="alamat" class="form-control" readonly><?php echo $data->alamat; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            <div class="checkbox checkbox-inline">
                                                <button class="btn btn-primary" type="submit" name="submit" style="margin-top:4%">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Detail Sewa</div>
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Baju</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="namamobil" class="form-control" value="<?php echo $data->nama_baju; ?>" required readonly>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal Mulai</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="mulai" class="form-control" value="<?php echo IndonesiaTgl($data->tgl_mulai); ?>" required readonly>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal Selesai</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="selesai" class="form-control" value="<?php echo IndonesiaTgl($data->tgl_selesai); ?>" required readonly>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Durasi</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="durasi" class="form-control" value="<?php echo $data->durasi; ?>" required readonly>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Total Biaya</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="total" class="form-control" value="<?php echo format_rupiah($total); ?>" required readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- COntainer Fluid-->
    </div>
</div>
<?= $this->endSection() ?>