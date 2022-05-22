<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Member extends BaseController
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
            "data" => $this->db->table("member")->get()
        ];
        return view('admin/member/index', $data);
    }
    public function detail($id)
    {
        $data = [
            "data" => $this->db->table("member")->where("id_user", $id)->get()->getFirstRow()
        ];
        return view('admin/member/detail', $data);
    }
}
