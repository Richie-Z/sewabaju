<?= $this->extend("layouts/admin") ?>
<?= $this->section("content") ?>
<?php helper("bantu");
$session = session(); ?>
<script type="text/javascript">
    function valid() {
        if (document.laporan.akhir.value < document.laporan.awal.value) {
            alert("Tanggal akhir harus lebih besar dari tanggal awal!");
            return false;
        }
        return true;
    }
</script>
<div class="content-wrapper">
    <div class="container-fluid">
        <h2 class="page-title">Laporan</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="get" name="laporan" onSubmit="return valid();" action="<?= base_url("admin/sewa/laporanGet") ?>">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label>Tanggal Awal</label>
                            <input type="date" class="form-control" name="awal" placeholder="From Date(dd/mm/yyyy)" required>
                        </div>
                        <div class="col-sm-4">
                            <label>Tanggal Akhir</label>
                            <input type="date" class="form-control" name="akhir" placeholder="To Date(dd/mm/yyyy)" required>
                        </div>
                        <div class="col-sm-4">
                            <label>&nbsp;</label><br />
                            <input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (!empty($data)) {
            $no = 0;
        ?>
            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
                <div class="panel-heading">Laporan Sewa Tanggal <?php echo IndonesiaTgl($mulai); ?> sampai <?php echo IndonesiaTgl($selesai); ?></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Sewa</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data->getResult() as $row) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo htmlentities($row->id_booking); ?></td>
                                        <td><?php echo IndonesiaTgl(htmlentities($row->tgl_booking)); ?></td>
                                        <td><?php echo format_rupiah($row->total_harga); ?></td>
                                    </tr>
                                <?php }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="<?php echo base_url("admin/laporan/cetak/$mulai/$selesai"); ?>" target="_blank" class="btn btn-primary">Cetak</a>
            </div>
        <?php } ?>


    </div>
</div>

</div>
</div>

<?= $this->endSection() ?>