<?php

namespace App\Controllers;

class Booking extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }
    public function index($id)
    {
        $baju = model("App\Models\Baju")->join("jenis", "jenis.id_jenis = baju.id_jenis")->join("kategori", "kategori.id_kategori = baju.id_kategori")->find($id);
        $data = [
            "baju" => $baju,
        ];
        return view('booking/index', $data);
    }
    public function ready($id)
    {
        $fromdate = $this->request->getVar('fromdate');
        $todate = $this->request->getVar('todate');
        $pickup = $this->request->getVar('pickup');
        $ukuran = $this->request->getVar('ukuran');
        $baju = model("App\Models\Baju")->join("jenis", "jenis.id_jenis = baju.id_jenis")->join("kategori", "kategori.id_kategori = baju.id_kategori")->find($id);
        $data = [
            "baju" => $baju,
            "id" => $id,
            "fromdate" => $fromdate,
            "todate" => $todate,
            "ukuran" => $ukuran,
            "pickup" => $pickup,
        ];
        return view("booking/ready", $data);
        // $booking = $this->db->table("booking")->where("tgl_booking BETWEEN $fromdate AND $todate")->where("id_baju", $id)->where("ukuran", $ukuran)->where("status !=", "Cancel")->where("status !=", "Menunggu Pembayaran");
        // if ($booking->get()->getNumRows() > 0) {
        //     return redirect()->to(base_url("booking/", $id))->with("pesan", "<script> alert ('Baju tidak tersedia di tanggal yang anda pilih, silahkan pilih tanggal atau ukuran lain!'); </script>");
        // } 

    }
    public function sewa()
    {
        helper("bantu");

        $tgl_mulai = $this->request->getVar('fromdate');
        $tgl_selesai = $this->request->getVar('todate');
        $pickup = $this->request->getVar('pickup');
        $ukuran = $this->request->getVar('ukuran');
        $id_baju = $this->request->getVar("id_baju");
        $total_sewa = $this->request->getVar("total_sewa");
        $durasi = $this->request->getVar("durasi");

        $kode = buatKode("TRX", $this->db->table("booking")->get()->getNumRows());
        $sql = $this->db->table("booking")->insert([
            "id_booking" => $kode,
            "id_baju" => $id_baju,
            "id_user" => session()->get("id_user"),
            "ukuran" => $ukuran,
            "tgl_mulai" => $tgl_mulai,
            "tgl_selesai" => $tgl_selesai,
            "durasi" => (int) filter_var($durasi, FILTER_SANITIZE_NUMBER_INT),
            "pickup" => $pickup,
            "total_harga" => $total_sewa,
            "status" => "Menunggu Pembayaran"
        ]);

        $baju = $this->db->table("baju")->where("id_baju", $id_baju);
        if ($sql) {
            $uk = "ukuran";
            $key = $$uk;
            $baju->update([
                $key => $baju->get()->getFirstRow()->$key - 1
            ]);
            return redirect()->to(base_url("booking/detail/" . $kode));
        } else {
            return redirect()->to(base_url("booking/" . $id_baju))->with("pesan", "<script> alert ('Gagal Sewa !'); </script>");
        }
    }
    public function detail($id)
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->where("id_booking", $id)->get()->getFirstRow(),
            "contactInfo" => $this->db->table("tblpages")->where("id", 5)->get()->getFirstRow()
        ];
        return view("booking/detail", $data);
    }
    public function cetak($id)
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->where("id_booking", $id)->get()->getFirstRow(),
            "contactInfo" => $this->db->table("tblpages")->where("id", 5)->get()->getFirstRow()
        ];
        return view("booking/cetak", $data);
    }
    public function riwayat()
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->where("id_user", session()->get("id_user"))->get(),
        ];
        return view("booking/riwayat", $data);
    }
    public function upload($id)
    {
        $data = [
            "data" => $this->db->table("booking")->join("baju", "baju.id_baju = booking.id_baju")->where("id_booking", $id)->get()->getFirstRow(),
            "contactInfo" => $this->db->table("tblpages")->where("id", 5)->get()->getFirstRow()
        ];
        return view("booking/upload", $data);
    }
    public function uploadBukti()
    {
        $id = $this->request->getVar("id_booking");
        $file = $this->request->getFile('image');
        $img = null;
        if (!empty($file->getBasename()) && !$file->hasMoved()) {
            $img = $file->getRandomName();
            $file->move('assets/images/bukti/', $img);
            $sql = $this->db->table("booking")->where("id_booking", $id)->update([
                "bukti_bayar" => $img,
                "status" => "Menunggu Konfirmasi"
            ]);
        }
        return redirect()->to(base_url("booking/riwayat"));
    }
    public function batal($id)
    {
        $sql = $this->db->table("booking")->where("id_booking", $id);
        $ukuran = $sql->get()->getFirstRow()->ukuran;
        $uk = "ukuran";
        $key = $$uk;
        $baju = $this->db->table("baju")->where("id_baju", $sql->get()->getFirstRow()->id_baju);
        $baju->update([
            $key => $baju->get()->getFirstRow()->$ukuran + 1
        ]);
        $this->db->query("DELETE FROM booking WHERE booking.id_booking = '$id'");
        return redirect()->to(base_url("booking/riwayat"));
    }
}
