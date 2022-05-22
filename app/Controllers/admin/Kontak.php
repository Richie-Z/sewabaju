<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Kontak extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
        $this->session = session();
    }
    public function index()
    {
        $data = $this->db->table("contactusinfo")->get()->getFirstRow();
        return view('admin/kontak', ["data" => $data]);
    }
    public function update()
    {
        $address = $this->request->getVar("address");
        $email = $this->request->getVar("email");
        $contactno = $this->request->getVar("contactno");
        $id_info = $this->request->getVar("id_info");
        $sql = $this->db->table("contactusinfo")->where("id_info", $id_info)->update(
            [
                "alamat_kami" => $address,
                "email_kami" => $email,
                "telp_kami" => $contactno,
            ]
        );
        return redirect()->to('/admin/kontak')->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
}
