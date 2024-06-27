<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminHome extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }
}
