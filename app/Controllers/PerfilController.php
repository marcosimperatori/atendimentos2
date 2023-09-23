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

    public function resetar()
    {
        $novaSenha = $this->request->getPost('senha');
        $usuario = $this->user->find(session()->get('user')->id);

        $novaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);

        $usuario->senha = $novaSenha;

        if ($this->user->protect(false)->save($usuario)) {
            return view('home/index');
        }
    }
}
