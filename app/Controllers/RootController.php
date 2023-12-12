<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EscritorioModel;
use App\Models\UserModel;

class RootController extends BaseController
{
    private $user;
    private $escritorioModel;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->escritorioModel = new EscritorioModel();
    }
    public function index()
    {
        $this->CriarUsuario();
    }

    public function pdfClientes()
    {
        $escritorios = $this->escritorioModel->select('*')
            ->orderBy('nome', 'asc')->findAll();
        $data = [];
    }

    private function CriarUsuario()
    {
        $usuario = [
            'nome' => 'marcos',
            'email' => 'marcos@email.com',
            'senha' => '123'
        ];

        if ($this->user->save($usuario)) {
            echo "Criado um novo usuário";
        } else {
            echo "Falha ao tentar criar novo usuário";
        }
    }
}
