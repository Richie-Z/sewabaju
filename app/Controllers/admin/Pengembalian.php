<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use DateTime;

class Pengembalian extends BaseController
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
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->join("member", "member.id_user = booking.id_user")->where("status", "Sudah Dibayar")->get(),
        ];
        return view('admin/sewa/pengembalian/index', $data);
    }
    public function edit($id)
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->join("member", "member.id_user = booking.id_user")->where("status", "Sudah Dibayar")->where("id_booking", $id)->get()->getFirstRow(),
        ];
        return view('admin/sewa/pengembalian/edit', $data);
    }
    public function selesai($id)
    {
        $status = "Selesai";
        $db = $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->where("id_booking", $id);
        $booking = $db->get()->getFirstRow();
        $tglSkrg = new DateTime();
        $tglSelesai = new DateTime($booking->tgl_selesai);
        $difference = $tglSkrg->diff($tglSelesai);
        $selisih = $difference->days;
        $denda = $tglSkrg < $tglSelesai ? 0 : $selisih * (($booking->harga / 3) / 2);

        $ukuran = $booking->ukuran;
        $uk = "ukuran";
        $key = $$uk;
        $baju = $this->db->table("baju")->where("id_baju", $booking->id_baju);
        $baju->update([
            $key => $baju->get()->getFirstRow()->$ukuran + 1
        ]);
        $sql = $db->update([
            "status" => $status,
            "denda" => $denda,
        ]);

        if ($sql) {
            return redirect()->to(base_url("admin/sewa/denda/" . $id))->with("pesan", "<script>alert('Transaksi telah selesai!');</script>");
        } else {
            return redirect()->to(base_url("admin/pengembalian"))->with("pesan", "<script>alert('Gagal!');</script>");
        }
    }
    public function hilang($id)
    {
        $status = "Hilang/Rusak";
        $db = $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->where("id_booking", $id);
        $booking = $db->get()->getFirstRow();
        $denda = 5 * ($booking->harga / 3);
        $sql = $db->update([
            "status" => $status,
            "denda" => $denda,
        ]);
        if ($sql) {
            return redirect()->to(base_url("admin/sewa/denda/" . $id))->with("pesan", "<script>alert('Baju Dinyatakan Hilang/Rusak!');</script>");
        } else {
            return redirect()->to(base_url("admin/pengembalian"))->with("pesan", "<script>alert('Gagal!');</script>");
        }
    }
}
