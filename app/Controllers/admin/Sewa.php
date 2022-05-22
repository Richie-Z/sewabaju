<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Sewa extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
        $this->session = session();
    }
    public function index()
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->join("member", "member.id_user = booking.id_user")->get(),
        ];
        return view('admin/sewa/index', $data);
    }
    public function status()
    {
        $id = $this->request->getVar("id_booking");
        $status = $this->request->getVar("status");
        if ($status == "Cancel") {
            $sql = $this->db->table("booking")->where("id_booking", $id);
            $ukuran = $sql->get()->getFirstRow()->ukuran;
            $uk = "ukuran";
            $key = $$uk;
            $baju = $this->db->table("baju")->where("id_baju", $sql->get()->getFirstRow()->id_baju);
            $baju->update([
                $key => $baju->get()->getFirstRow()->$ukuran + 1
            ]);
            $this->db->query("DELETE FROM booking WHERE booking.id_booking = '$id'");
            return redirect()->to(base_url("admin/dashboard"));
        }
        $data = [
            "status" => $status,
        ];
        if ($status == "Menunggu Pembayaran")
            $data["bukti_bayar"] = null;
        $sql = $this->db->table("booking")->where("id_booking", $id)->update($data);
        return redirect()->to(base_url("admin/dashboard"));
    }
    public function denda($id)
    {
        $sql = $this->db->table("booking")->where("id_booking", $id);
        return view("admin/sewa/denda", ["denda" => $sql->get()->getFirstRow()->denda]);
    }
    public function detailSewa($id)
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->where("id_booking", $id)->get()->getFirstRow(),
        ];
        return view("admin/sewa/detail", $data);
    }
    public function laporan()
    {
        return view("admin/laporan/index");
    }
    public function laporanGet()
    {
        $awal = $this->request->getVar("awal");
        $akhir = $this->request->getVar("akhir");
        $booking = $this->db->table("booking")->where("tgl_booking BETWEEN $awal and $akhir")->where("status", "Sudah Dibayar")->orWhere("status", "Selesai")->get();
        return view("admin/laporan/index", ["data" => $booking, "mulai" => $awal, "selesai" => $akhir]);
    }
    public function laporanCetak($awal, $akhir)
    {
        $booking = $this->db->table("booking")->where("tgl_booking BETWEEN $awal and $akhir")->where("status", "Sudah Dibayar")->orWhere("status", "Selesai")->get();
        return view("admin/laporan/cetak", ["data" => $booking, "awal" => $awal, "akhir" => $akhir]);
    }
}
