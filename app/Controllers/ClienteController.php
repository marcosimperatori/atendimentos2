<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ClienteController extends BaseController
{
    public function index()
    {
        return view('cliente/index');
    }
}
