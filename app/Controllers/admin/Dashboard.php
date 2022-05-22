<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
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
            "menungguBayar" => $this->db->table("booking")->where("status", "Menunggu Pembayaran")->get()->getNumRows(),
            "menungguKonfirm" => $this->db->table("booking")->where("status", "Menunggu Konfirmasi")->get()->getNumRows(),
            "belumDikembalikan" => $this->db->table("booking")->where("status", "Sudah Dibayar")->get()->getNumRows(),
            "jenis" => $this->db->table("jenis")->get()->getNumRows(),
            "baju" => $this->db->table("baju")->get()->getNumRows(),
            "sewa" => $this->db->table("booking")->get()->getNumRows(),
            "member" => $this->db->table("member")->get()->getNumRows(),
            "pesan" => $this->db->table("contactus")->get()->getNumRows(),
        ];
        return view('admin/Dashboard', $data);
    }
}
