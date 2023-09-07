<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CertificadoController extends BaseController
{
    public function index()
    {
        return view('certificado/index');
    }
}
