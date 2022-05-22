<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php helper("bantu") ?>

<script type="text/javascript">
    function valid() {
        if (document.sewa.todate.value < document.sewa.fromdate.value) {
            alert("Tanggal selesai harus lebih besar dari tanggal mulai sewa!");
            return false;
        }
        if (document.sewa.fromdate.value < document.sewa.now.value) {
            alert("Tanggal sewa minimal H-1!");
            return false;
        }

        return true;
    }
</script>

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
        <h3>Detail Sewa</h3>
    </center>
    <div class="container">
        <div class="user_profile_info">
            <div class="col-md-12 col-sm-10">
                <form method="post" name="sewa" onSubmit="return valid();">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $data->id_baju; ?>" required>
                    <div class="form-group">
                        <label>Kode Sewa</label>
                        <input type="text" class="form-control" name="mobil" value="<?php echo $data->id_booking; ?>" readonly>
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
                        <label>Biaya Sewa (<?php echo $durasi; ?> Hari)</label><br />
                        <input type="text" class="form-control" name="total" value="<?php echo format_rupiah($totalsewa); ?>" readonly>
                    </div>
                    <?php if ($data->status == "Menunggu Pembayaran") { ?>
                        <b>*Silahkan transfer total biaya sewa ke <?php echo $contactInfo->detail; ?> maksimal tanggal <?php echo IndonesiaTgl($tglhasil); ?>.
                        <?php
                    } else { ?>
                            <div class="form-group">
                                <label>Bukti Pembayaran</label><br />
                                <img src="<?= base_url("assets/images/bukti/" . $data->bukti_bayar) ?>" alt="">
                            </div>
                        <?php } ?>
                        </b>
                        <br /><br />
                        <div class="form-group">
                            <a href="<?php echo base_url("booking/cetak/" . $data->id_booking); ?>" target="_blank" class="btn btn-primary btn-xs">Cetak</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>