<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($arguments[0] == "guest") {
            if (session()->get("adminLogin")) {
                return redirect()->to(base_url("admin/dashboard"));
            }
        } else {
            if (!session()->get('adminLogin')) {
                return redirect()->to(base_url())->with("login", "<script>alert('Anda belum login!');</script>");
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
