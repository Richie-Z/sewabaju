<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $bajuModel = model("App\Models\Baju")->get();
        return view('Index', ["baju" => $bajuModel]);
    }
    public function page($page = null)
    {
        $db = \Config\Database::connect();
        $query = $db->table("tblpages")->where("type", $page)->get();
        if (count($query->getResult()) <= 0) {
            return redirect()->to(base_url());
        }
        return view("Page", ["data" => $query->getRow()]);
    }
    public function contactUs()
    {

        $db = \Config\Database::connect();
        $query = $db->table("contactusinfo")->get();
        return view("ContactUs", ["contact" => $query]);
    }
    public function postContactUs()
    {
        helper('form');
        $request = \Config\Services::request();
        $db = \Config\Database::connect()->table("contactus");
        $fullname = $request->getVar("fullname");
        $email = $request->getVar("email");
        $contactno = $request->getVar("contactno");
        $message = $request->getVar("message");
        $sql = $db->insert([
            "nama_visit" => $fullname,
            "email_visit" => $email,
            "telp_visit" => $contactno,
            "pesan" => $message,
        ]);

        return redirect()->to(base_url("/contact_us"))->with($sql ? "message" : "error", $sql ? "Pesan Terkirim. Kami akan menghubungi anda secepatnya." : "Terjadi Kesalahan! Silahkan coba lagi.");
    }

    public function login()
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect()->table("member");
        $session = session();

        $email = $request->getVar('email');
        $password = $request->getVar('password');
        $data = $db->where("email", $email)->get()->getFirstRow();
        if ($data) {
            $userPass = $data->password;
            if (password_verify($password, $userPass)) {
                $sessionUser = [
                    "id_user" => $data->id_user,
                    "nama_user" => $data->nama_user,
                    "email" => $data->email,
                    "isLogin" => TRUE,
                ];
                $session->set($sessionUser);
                return redirect()->to(base_url())->with("login", "<script>alert('Sukses Login!');</script>");
            }
            return redirect()->to(base_url())->with("login", "<script>alert('Password Salah!');</script>");
        }
        return redirect()->to(base_url())->with("login", "<script>alert('Email Salah!');</script>");
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url())->with("login", "<script>alert('Logout Berhasil!');</script>");
    }
    public function profile()
    {
        $db = \Config\Database::connect();
        $session = session();

        $query = $db->table("member")->where("id_user", $session->get("id_user"))->get();
        return view("Profile", ["data" => $query->getRow()]);
    }
    public function update_profile()
    {
        $db = \Config\Database::connect();
        $session = session();
        $request = \Config\Services::request();
        $fname = $request->getVar('fullname');
        $email = $request->getVar('email');
        $mobile = $request->getVar('mobilenumber');
        $alamat = $request->getVar('address');
        $id = $session->get("id_user");
        $query = $db->table("member")->where("id_user", $id);
        $query->update([
            "nama_user" => $fname,
            "email" => $email,
            "telp" => $mobile,
            "alamat" => $alamat,
        ]);
        $sessionUser = [
            "id_user" => $id,
            "nama_user" => $fname,
            "email" => $email,
            "isLogin" => TRUE,
        ];
        $session->set($sessionUser);
        return redirect()->to(base_url("profile"))->with("msg", "Berhasil diupdate");
    }
    public function updatePassword()
    {
        return view("UpdatePassword");
    }
    public function update_password()
    {
        $db = \Config\Database::connect();
        $session = session();
        $request = \Config\Services::request();
        $pass = $request->getVar('pass');
        $new = $request->getVar('new');
        $confirm = $request->getVar('confirm');
        $id = $session->get("id_user");

        $query = $db->table("member")->where("id_user", $id);
        if (password_verify($pass, $query->get()->getFirstRow()->password)) {
            if ($new  == $confirm) {
                $query->update([
                    "password" => password_hash($new, PASSWORD_BCRYPT),
                ]);
                return redirect()->to(base_url("update_password"))->with("msg", "<script>alert('Berhasil!');</script>");
            }
            return redirect()->to(base_url("update_password"))->with("msg", "<script>alert('Confirm password tidak sama!');</script>");
        }
        return redirect()->to(base_url("update_password"))->with("msg", "<script>alert('Password tidak sama!');</script>");
    }
}
