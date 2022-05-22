<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Baju extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
        $this->session = session();
    }
    public function index()
    {
        $baju = $this->db->table("baju")->join("jenis", "jenis.id_jenis = baju.id_jenis")->join("kategori", "kategori.id_kategori = baju.id_kategori")->get();
        return view('admin/baju/index', ["data" => $baju]);
    }
    public function add()
    {
        $kategori = $this->db->table("kategori")->get();
        $jenis = $this->db->table("jenis")->get();
        return view('admin/baju/tambah', ["kategori" => $kategori, "jenis" => $jenis]);
    }
    public function store()
    {
        $nama = $this->request->getVar("nama");
        $jenis = $this->request->getVar("jenis");
        $deskripsi = $this->request->getVar("deskripsi");
        $kategori = $this->request->getVar("kategori");
        $harga = $this->request->getVar("harga");
        $s = $this->request->getVar("s");
        $m = $this->request->getVar("m");
        $l = $this->request->getVar("l");
        $xl = $this->request->getVar("xl");

        $img1 = $this->request->getFile('img1');
        $img2 = $this->request->getFile('img2');
        $img3 = $this->request->getFile('img3');
        $name1 = null;
        $name2 = null;
        $name3 = null;

        if (!$img1->hasMoved() && !$img2->hasMoved() && !$img3->hasMoved()) {
            $name1 = $img1->getRandomName();
            $name2 = $img2->getRandomName();
            $name3 = $img3->getRandomName();
            $img1->move('admin_assets/img/baju/', $name1);
            $img2->move('admin_assets/img/baju/', $name2);
            $img3->move('admin_assets/img/baju/', $name3);
        }
        $sql = $this->db->table("baju")->insert([
            "nama_baju" => $nama,
            "id_jenis" => $jenis,
            "deskripsi" => $deskripsi,
            "id_kategori" => $kategori,
            "deskripsi" => $deskripsi,
            "harga" => $harga,
            "s" => $s,
            "m" => $m,
            "l" => $l,
            "xl" => $xl,
            "gambar1" => $name1,
            "gambar2" => $name2,
            "gambar3" => $name3,
        ]);

        return redirect()->to(base_url("/admin/baju"))->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
    public function detail($id)
    {
        $baju = $this->db->table("baju")->join("jenis", "jenis.id_jenis = baju.id_jenis")->join("kategori", "kategori.id_kategori = baju.id_kategori")->where("id_baju", $id)->get()->getFirstRow();
        return view('admin/baju/detail', ["data" => $baju]);
    }
    public function ubah($id)
    {
        $baju = $this->db->table("baju")->join("jenis", "jenis.id_jenis = baju.id_jenis")->join("kategori", "kategori.id_kategori = baju.id_kategori")->where("id_baju", $id)->get()->getFirstRow();
        $kategori = $this->db->table("kategori")->get();
        $jenis = $this->db->table("jenis")->get();
        return view('admin/baju/edit', ["data" => $baju, "kategori" => $kategori, "jenis" => $jenis]);
    }
    public function edit()
    {
        $nama = $this->request->getVar("nama");
        $jenis = $this->request->getVar("jenis");
        $deskripsi = $this->request->getVar("deskripsi");
        $kategori = $this->request->getVar("kategori");
        $harga = $this->request->getVar("harga");
        $s = $this->request->getVar("s");
        $m = $this->request->getVar("m");
        $l = $this->request->getVar("l");
        $xl = $this->request->getVar("xl");
        $id = $this->request->getVar("id");
        $baju = $this->db->table("baju")->where("id_baju", $id);

        $img1 = $this->request->getFile('img1');
        $img2 = $this->request->getFile('img2');
        $img3 = $this->request->getFile('img3');
        $name1 = $baju->get()->getFirstRow()->gambar1;
        $name2 = $baju->get()->getFirstRow()->gambar2;
        $name3 = $baju->get()->getFirstRow()->gambar3;

        if (!empty($img1->getBasename()) && !$img1->hasMoved()) {
            $name1 = $img1->getRandomName();
            $img1->move('admin_assets/img/baju/', $name1);
        }
        if (!empty($img2->getBasename()) && !$img2->hasMoved()) {
            $name2 = $img2->getRandomName();
            $img2->move('admin_assets/img/baju/', $name2);
        }
        if (!empty($img3->getBasename()) && !$img3->hasMoved()) {
            $name3 = $img3->getRandomName();
            $img3->move('admin_assets/img/baju/', $name3);
        }
        $sql = $baju->update([
            "nama_baju" => $nama,
            "id_jenis" => $jenis,
            "deskripsi" => $deskripsi,
            "id_kategori" => $kategori,
            "deskripsi" => $deskripsi,
            "harga" => $harga,
            "s" => $s,
            "m" => $m,
            "l" => $l,
            "xl" => $xl,
            "gambar1" => $name1,
            "gambar2" => $name2,
            "gambar3" => $name3,
        ]);

        return redirect()->to(base_url("/admin/baju"))->with("pesan", $sql ? "Sukses." : "Gagal.");
    }
    public function hapus($id)
    {
        $baju = $this->db->table("baju")->where("id_baju", $id);
        return redirect()->to(base_url("/admin/baju"))->with("pesan", $baju->delete() ? "Sukses." : "Gagal.");
    }
}
