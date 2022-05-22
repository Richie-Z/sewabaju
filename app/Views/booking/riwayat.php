<?= $this->extend("layouts/client") ?>
<?= $this->section("content") ?>
<?php helper("bantu") ?>
<section class="user_profile inner_pages">
    <center>
        <h3>Riwayat Sewa</h3>
    </center>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="23" align="center">No</th>
                        <th width="100">Kode Sewa</th>
                        <th width="120">Baju</th>
                        <th width="80">Tgl. Mulai</th>
                        <th width="80">Tgl. Selesai</th>
                        <th width="50">Durasi</th>
                        <th width="100">Biaya Sewa</th>
                        <th width="100">Status</th>
                        <th width="90">Opsi</th>
                    </tr>
                </thead>
                <?php
                $nomor = 0;
                if ($data->getNumRows() != 0) {
                    foreach ($data->getResult() as $row) {
                        $harga    = $row->harga;
                        $durasi = $row->durasi;
                        $totalsewa = $durasi * ($harga / 3);
                        $tglmulai = strtotime($row->tgl_mulai);
                        $jmlhari  = 86400 * 1;
                        $tgl      = $tglmulai - $jmlhari;
                        $tglhasil = date("Y-m-d", $tgl);
                        $nomor++;
                ?>
                        <tr>
                            <td align="center"><?php echo $nomor; ?></td>
                            <td><?php echo $row->id_booking; ?></td>
                            <td><?php echo $row->nama_baju; ?></td>
                            <td><?php echo IndonesiaTgl($row->tgl_mulai); ?></td>
                            <td><?php echo IndonesiaTgl($row->tgl_selesai); ?></td>
                            <td><?php echo $row->durasi; ?> Hari</td>
                            <td><?php echo format_rupiah($totalsewa); ?></td>
                            <td><?php echo $row->status; ?></td>
                            <td align="center">
                                <?php
                                if ($row->status == "Menunggu Pembayaran") {
                                ?>
                                    <a href="<?php echo base_url("/booking/upload/" . $row->id_booking); ?>"><u>Upload Pembayaran<u /></a> |
                                    <a href="<?php echo base_url("/booking/batal/" . $row->id_booking); ?>"><u>Batalkan<u /></a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo base_url("/booking/detail/" . $row->id_booking); ?>" class="glyphicon glyphicon-eye-open"></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>

                <?php
                } else {
                ?>
                    <tr>
                        <td colspan="11" align="center"><b>Belum ada riwayat sewa.</b></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection() ?>