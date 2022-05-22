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

<div>
    <br />
    <center>
        <h3>Baju Tersedia untuk disewa.</h3>
    </center>
    <hr>
</div>
<?php
$start = new DateTime($fromdate);
$finish = new DateTime($todate);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur + 1;

$harga    = $baju['harga'] / 3;
$totalsewa = $durasi * $harga;
?>
<section class="user_profile inner_pages">
    <div class="container">
        <div class="col-md-6 col-sm-8">
            <div class="product-listing-img"><img src="<?php echo base_url("admin_assets/img/baju/" . $baju['gambar1']); ?>" class="img-responsive" alt="Image" /> </a> </div>
            <div class="product-listing-content">
                <h5><?php echo htmlentities($baju['nama_baju']); ?></a></h5>
                <p class="list-price"><?php echo htmlentities(format_rupiah($baju['harga'])); ?> / 3 Hari</p>
            </div>
        </div>

        <div class="user_profile_info">
            <div class="col-md-12 col-sm-10">
                <form method="post" name="sewa" onSubmit="return valid();" action="<?= base_url("booking/sewa") ?>">
                    <input type="hidden" name="id_baju" value="<?= $id ?>">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" value="<?php echo $fromdate; ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" value="<?php echo $todate; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>Durasi</label>
                            <input type="text" class="form-control" name="durasi" value="<?php echo $durasi; ?> Hari" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label>Ukuran</label>
                            <input type="text" class="form-control" name="ukuran" value="<?php echo $ukuran; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>Metode Pickup</label>
                            <input type="text" class="form-control" name="pickup" value="<?php echo $pickup; ?>" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label>Biaya Sewa</label>
                            <input type="text" class="form-control" name="sewa" value="<?php echo format_rupiah($totalsewa); ?>" readonly>
                            <input type="hidden" name="total_sewa" value="<?php echo ($totalsewa); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            &nbsp;
                        </div>
                        <div class="col-sm-6">
                            &nbsp;
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="submit" name="submit" value="Sewa" class="btn btn-block">
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>