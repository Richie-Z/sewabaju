<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Pesan extends BaseController
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
            "data" => $this->db->table("contactus")->get()
        ];
        return view('admin/pesan', $data);
    }
    public function baca($id)
    {
        $sql = $this->db->table("contactus")->where("id_cu", $id)->update(["status" => 1]);
        return redirect()->to('/admin/pesan')->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
}
