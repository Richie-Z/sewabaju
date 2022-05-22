<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php helper("bantu") ?>

<?php
$harga    = $data->harga;
$durasi = $data->durasi;
$totalsewa = $durasi * ($harga / 3);
$tglmulai = strtotime($data->tgl_mulai);
$jmlhari  = 86400 * 1;
$tgl      = $tglmulai - $jmlhari;
$tglhasil = date("Y-m-d", $tgl);
?>
<section class="user_profile inner_pages">
    <center>
        <h3>Edit Sewa</h3>
    </center>
    <div class="container">
        <div class="user_profile_info">
            <div class="col-md-12 col-sm-10">
                <form method="post" action="<?= base_url("booking/uploadBukti") ?>" name="sewa" onSubmit="return valid();" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Kode Sewa</label>
                        <input type="text" class="form-control" name="id_booking" value="<?php echo $data->id_booking; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Baju</label>
                        <input type="text" class="form-control" name="mobil" value="<?php echo $data->nama_baju; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?php echo $data->tgl_mulai; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?php echo $data->tgl_selesai; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Durasi</label>
                        <input type="text" class="form-control" name="durasi" value="<?php echo $durasi; ?> Hari" readonly>
                    </div>
                    <div class="form-group">
                        <label>Total Biaya Sewa (<?php echo $durasi; ?> Hari)</label><br />
                        <input type="text" class="form-control" name="total" value="<?php echo format_rupiah($totalsewa); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Upload Bukti Pembayaran</label><br />
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                    </div>
                    <div class="hr-dashed"></div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>