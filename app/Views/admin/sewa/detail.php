<html>

<head>
</head>
<?php
helper("bantu");
$harga    = $data->harga;
$durasi = $data->durasi;
$totalsewa = $durasi * ($harga / 3);
$tglmulai = strtotime($data->tgl_mulai);
$jmlhari  = 86400 * 1;
$tgl      = $tglmulai - $jmlhari;
$tglhasil = date("Y-m-d", $tgl);
?>

<body>
    <div id="section-to-print">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Detail Sewa</h4>
        </div>
        <div><br /></div>
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
                <div class="form-group">
                    Belum Ada Bukti Pembayaran
                </div>
            <?php
            } else { ?>
                <div class="form-group">
                    <label>Bukti Pembayaran</label><br />
                    <img src="<?= base_url("assets/images/bukti/" . $data->bukti_bayar) ?>" alt="">
                </div>
            <?php } ?>
            </b>
            <br />

        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

    </div>

</body>

</html>