<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Jenis extends BaseController
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
            "data" => $this->db->table("jenis")->get()
        ];
        return view('admin/jenis/index', $data);
    }
    public function tambah()
    {
        return view('admin/jenis/tambah');
    }
    public function simpan()
    {
        $nama = $this->request->getVar("jenis");
        $sql = $this->db->table("jenis")->insert(["nama_jenis" => $nama]);
        return redirect()->to('/admin/jenis')->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
    public function ubah($id)
    {
        $data = [
            "data" => $this->db->table("jenis")->where("id_jenis", $id)->get()->getFirstRow(),
        ];
        return view('admin/jenis/edit', $data);
    }
    public function edit()
    {
        $nama = $this->request->getVar("jenis");
        $id = $this->request->getVar("id_jenis");
        $sql = $this->db->table("jenis")->where("id_jenis", $id)->update(["nama_jenis" => $nama]);
        return redirect()->to('/admin/jenis')->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
    public function hapus($id)
    {
        $jenis = $this->db->table("jenis")->where("id_jenis", $id);
        return redirect()->to(base_url("/admin/jenis"))->with("pesan", $jenis->delete() ? "Sukses." : "Gagal.");
    }
}
