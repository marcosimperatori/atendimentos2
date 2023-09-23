<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class PerfilController extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $user = $this->user->select('nome,email')->where('id', session()->get('user')->id)->first();
        $data = [
            'user' => $user
        ];

        return view('perfil/index', $data);
    }
}
