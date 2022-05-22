<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Pembayaran extends BaseController
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
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->join("member", "member.id_user = booking.id_user")->where("status", "Menunggu Pembayaran")->get(),
        ];
        return view('admin/sewa/pembayaran/index', $data);
    }
    public function edit($id)
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->join("member", "member.id_user = booking.id_user")->where("status", "Menunggu Pembayaran")->where("id_booking", $id)->get()->getFirstRow(),
        ];
        return view('admin/sewa/pembayaran/edit', $data);
    }
}
