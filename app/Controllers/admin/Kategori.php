<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Kategori extends BaseController
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
            "data" => $this->db->table("kategori")->get()
        ];
        return view('admin/kategori/index', $data);
    }
    public function tambah()
    {
        return view('admin/kategori/tambah');
    }
    public function simpan()
    {
        $nama = $this->request->getVar("kategori");
        $sql = $this->db->table("kategori")->insert(["nama" => $nama]);
        return redirect()->to('/admin/kategori')->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
    public function ubah($id)
    {
        $data = [
            "data" => $this->db->table("kategori")->where("id_kategori", $id)->get()->getFirstRow(),
        ];
        return view('admin/kategori/edit', $data);
    }
    public function edit()
    {
        $nama = $this->request->getVar("kategori");
        $id = $this->request->getVar("id_kategori");
        $sql = $this->db->table("kategori")->where("id_kategori", $id)->update(["nama" => $nama]);
        return redirect()->to('/admin/kategori')->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
    public function hapus($id)
    {
        $kategori = $this->db->table("kategori")->where("id_kategori", $id);
        return redirect()->to(base_url("/admin/kategori"))->with("pesan", $kategori->delete() ? "Sukses." : "Gagal.");
    }
}
