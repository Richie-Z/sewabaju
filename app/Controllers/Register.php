<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }
    public function index()
    {
        return view('Register');
    }
    public function check_availability()
    {
        if (!empty($this->request->getVar("emailid"))) {
            $email = $this->request->getVar("emailid");
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo "error : You did not enter a valid email.";
            } else {
                $sql = $this->db->table("member")->where("email", $email)->get();
                if ($sql->getNumRows() > 0) {
                    echo "<span style='color:red'> Email sudah terdaftar.</span>";
                    echo "<script>$('#submit').prop('disabled',true);</script>";
                } else {
                    echo "<span style='color:green'> Email bisa untuk mendaftar.</span>";
                    echo "<script>$('#submit').prop('disabled',false);</script>";
                }
            }
        }
    }
    public function regist()
    {
        $fname = $this->request->getVar('fullname');
        $email = $this->request->getVar('emailid');
        $mobile = $this->request->getVar('mobileno');
        $alamat = $this->request->getVar('alamat');
        $pass = $this->request->getVar('pass');
        $conf = $this->request->getVar('conf');
        if ($conf != $pass) {
            echo "<script>alert('Password tidak sama!');</script>";
            return redirect()->to(base_url("register"));
        } else {
            $sql = $this->db->table("member")->where("email", $email)->get();
            if ($sql->getNumRows() > 0) {
                return redirect()->to(base_url("register"))->with("register", "<script>alert('Email sudah terdaftar, silahkan gunakan email lain!');</script>");
            } else {
                $sql = $this->db->table("member")->insert([
                    "nama_user" => $fname,
                    "email" => $email,
                    "telp" => $mobile,
                    "password" => password_hash($pass, PASSWORD_BCRYPT),
                    "alamat" => $alamat,
                ]);
                if ($sql) {
                    return redirect()->to(base_url())->with("register", true);
                } else {
                    echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
                    return redirect()->to(base_url("register"))->with("register", "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>");
                }
            }
        }
    }
}
