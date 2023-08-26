<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AtendeController extends BaseController
{
    public function index()
    {
        return view('atendimento/index');
    }
}
