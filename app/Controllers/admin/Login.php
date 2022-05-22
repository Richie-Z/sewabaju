<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
        $this->session = session();
    }
    public function index()
    {
        return view('admin/Login');
    }
    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->db->table("admin")->where("UserName", $username)->get()->getFirstRow();
        if ($data) {
            $userPass = $data->Password;
            if (password_verify($password, $userPass)) {
                $sessionUser = [
                    "username" => $data->UserName,
                    "name" => $data->name,
                    "image" => $data->Image,
                    "adminLogin" => TRUE,
                    "id" => $data->id,
                ];
                $this->session->set($sessionUser);
                return redirect()->to(base_url("admin/dashboard"))->with("login", "<script>alert('Sukses Login!');</script>");
            }
            return redirect()->to(base_url("admin"))->with("login", "<script>alert('Password Salah!');</script>");
        }
        return redirect()->to(base_url("admin"))->with("login", "<script>alert('Email Salah!');</script>");
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url("admin"))->with("login", "<script>alert('Logout Berhasil!');</script>");
    }
    public function profile()
    {
        return view("admin/Profile");
    }
    public function update_profile()
    {
        $img = $this->request->getVar('oldimage');
        $nama = $this->request->getVar('nama');

        $id = $this->session->get("id");
        $file = $this->request->getFile('image');

        if (!empty($file->getBasename()) && !$file->hasMoved()) {
            $img = $file->getRandomName();
            $file->move('admin_assets/img/', $img);
        }
        $query = $this->db->table("admin")->where("id", $id);
        $query->update([
            "name" => $nama,
            "Image" => $img,
        ]);
        $sessionUser = [
            "name" => $nama,
            "image" => $img,
            "adminLogin" => TRUE,
            "id" => $id,
        ];
        $this->session->set($sessionUser);
        return redirect()->to(base_url("admin/profile"))->with("msg", "Berhasil diupdate");
    }
    public function updatePassword()
    {
        return view("admin\ChangePassword");
    }
    public function update_password()
    {

        $password = $this->request->getVar('password');
        $newpassword = $this->request->getVar('newpassword');
        $confirmpassword = $this->request->getVar('confirmpassword');
        $id = $this->session->get("id");

        $query = $this->db->table("admin")->where("id", $id);
        if (password_verify($password, $query->get()->getFirstRow()->Password)) {
            if ($newpassword  == $confirmpassword) {
                $query->update([
                    "password" => password_hash($newpassword, PASSWORD_BCRYPT),
                ]);
                return redirect()->to(base_url("admin/change"))->with("msg", "<script>alert('Berhasil!');</script>");
            }
            return redirect()->to(base_url("admin/change"))->with("msg", "<script>alert('Confirm password tidak sama!');</script>");
        }
        return redirect()->to(base_url("admin/change"))->with("msg", "<script>alert('Password tidak sama!');</script>");
    }
}
