<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Halaman extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
        $this->session = session();
    }
    public function index()
    {
        return view('admin/halaman');
    }
    public function update()
    {
        $pgedetails = $this->request->getVar("pgedetails");
        $type = $this->request->getVar("type");
        $sql = $this->db->table("tblpages")->where("type", $type)->update(["detail" => $pgedetails]);
        return redirect()->to('/admin/halaman')->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
}
