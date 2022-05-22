<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Konfirmasi extends BaseController
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
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->join("member", "member.id_user = booking.id_user")->where("status", "Menunggu Konfirmasi")->get(),
        ];
        return view('admin/sewa/konfirmasi/index', $data);
    }
    public function edit($id)
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->join("member", "member.id_user = booking.id_user")->where("status", "Menunggu Konfirmasi")->where("id_booking", $id)->get()->getFirstRow(),
        ];
        return view('admin/sewa/konfirmasi/edit', $data);
    }
}
