<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PerfilController extends BaseController
{
    public function index()
    {
        return view('perfil/index');
    }
}
