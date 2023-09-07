<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TipoModel;

class TipoController extends BaseController
{
    private $tipoModel;

    public function __construct()
    {
        $this->tipoModel = new TipoModel();
    }

    public function index()
    {
        $tipos = $this->tipoModel->select('id,descricao,midia')->orderBy('descricao', 'asc')->findAll();
        $data = [
            'tipos' => $tipos
        ];
        return view('tipo/index', $data);
    }
}
