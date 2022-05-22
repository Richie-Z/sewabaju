<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php helper("bantu") ?>

<?php
if (session()->getFlashdata("pesan"))
    echo session()->getFlashdata("pesan");
$tglnow   = date('Y-m-d');
$tglmulai = strtotime($tglnow);
$jmlhari  = 86400 * 1;
$tglplus  = $tglmulai + $jmlhari;
$now = date("Y-m-d", $tglplus);
?>

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
                <form method="post" name="sewa" onSubmit="return valid();" action="<?= base_url("booking/ready/" . $baju["id_baju"]) ?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $baju["id_baju"]; ?>" required>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
                        <input type="hidden" name="now" class="form-control" value="<?php echo $now; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
                    </div>
                    <div class="form-group">
                        <label>Ukuran</label><br />
                        <select class="form-control" name="ukuran" required>
                            <option value="">== Pilih Ukuran ==</option>
                            <option value="s" <?= $baju["s"] != 0 ?: "disabled" ?>>S - Stok : <?= $baju["s"] ?></option>
                            <option value="m" <?= $baju["m"] != 0 ?: "disabled" ?>>M - Stok : <?= $baju["m"] ?></option>
                            <option value="l" <?= $baju["l"] != 0 ?: "disabled" ?>>L - Stok : <?= $baju["l"] ?></option>
                            <option value="xl" <?= $baju["xl"] != 0 ?: "disabled" ?>>XL - Stok : <?= $baju["xl"] ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Metode Pickup</label><br />
                        <select class="form-control" name="pickup" required>
                            <option value="">== Metode Pickup ==</option>
                            <option value="Ambil Sendiri">Ambil Sendiri</option>
                            <option value="Kurir">Kurir</option>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <input type="submit" name="submit" value="Cek Ketersediaan" class="btn btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>