<?php
function format_rupiah($rp)
{
    $jumlah = number_format($rp, 0, ",", ".");
    $rupiah = "Rp. " . $jumlah;

    return $rupiah;
}
function format_rupiah_akunting($rp)
{
    $jumlah = number_format($rp, 0, ",", ".");
    $rupiah = '<div class="float-left">Rp</div><div class="float-right">' . $jumlah . '</div><div class="clear-both"></div>';

    return $rupiah;
}
function format_rupiah_kwitansi($rp)
{
    $jumlah = number_format($rp, 0, ",", ".");
    $rupiah = "Rp" . $jumlah . ",-";

    return $rupiah;
}
function buatKode($inisial, $id)
{
    $format = sprintf('%04d', $id + 1);
    return $inisial . $format;
}
function IndonesiaTgl($tanggal)
{
    $tgl = substr($tanggal, 8, 2);
    $bln = substr($tanggal, 5, 2);
    $thn = substr($tanggal, 0, 4);
    $tanggal = "$tgl-$bln-$thn";
    return $tanggal;
}
