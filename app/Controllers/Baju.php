<?php

namespace App\Controllers;

class Baju extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }
    public function index($id = null)
    {
        if (empty($id)) {
            $jenis = model("App\Models\Jenis")->get();
            $baju = model("App\Models\Baju")->join("jenis", "jenis.id_jenis = baju.id_jenis");
            $kategori = $this->db->table("kategori")->get();
            return view('Bajus', [
                "jenis" => $jenis->getRow(),
                "message" => "Daftar Baju",
                "kategori" => $kategori,
                "baju" => $baju
            ]);
        }
        $bajuModel = model("App\Models\Baju", false)->find($id);
        $data = [
            "baju" => $bajuModel,
            "jenis" => model("App\Models\Baju")->where("id_baju !=", $id)->where("id_jenis", $bajuModel["id_jenis"])->get(),
        ];
        return view('Baju', $data);
    }
    public function jenisBaju($id)
    {
        $jenis = model("App\Models\Jenis")->where("id_jenis", $id)->get();
        if ($jenis->getNumRows() == 0) return redirect()->to(base_url());
        $baju = model("App\Models\Baju")->join("jenis", "jenis.id_jenis = baju.id_jenis")->where("jenis.id_jenis", $id);
        $kategori = $this->db->table("kategori")->get();
        return view('Bajus', [
            "jenis" => $jenis->getRow(),
            "message" => "Daftar " . $jenis->getRow()->nama_jenis,
            "kategori" => $kategori,
            "baju" => $baju
        ]);
    }
    public function cariKategori()
    {
        $idKategori =  $this->request->getVar("kategori");
        if (empty($idKategori)) return redirect()->to(base_url());
        $idJenis = $this->request->getVar("id_jenis");
        $jenis = model("App\Models\Jenis")->where("id_jenis", $idJenis)->get();
        if ($jenis->getNumRows() == 0) return redirect()->to(base_url());
        $baju = model("App\Models\Baju")->join("jenis", "jenis.id_jenis = baju.id_jenis")->where("jenis.id_jenis", $idJenis)->where("baju.id_kategori", $idKategori);
        $kategori = $this->db->table("kategori")->get();
        return view('Bajus', [
            "jenis" => $jenis->getRow(),
            "message" => "Daftar " . $jenis->getRow()->nama_jenis . " Untuk " . $this->db->table("kategori")->where("id_kategori", $idKategori)->get()->getFirstRow()->nama,
            "kategori" => $kategori,
            "baju" => $baju
        ]);
    }
}
