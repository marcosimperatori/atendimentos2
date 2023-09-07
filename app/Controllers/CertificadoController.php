<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClienteModel;
use App\Models\TipoModel;

class CertificadoController extends BaseController
{
    private $clienteModel;
    private $tipoModel;

    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
        $this->tipoModel = new TipoModel();
    }

    public function index()
    {
        $clientes = $this->clienteModel->select('clientes.id,clientes.nomecli,escritorios.nome')
            ->join('escritorios', 'escritorios.id = clientes.escritorio')
            ->orderBy('nomecli', 'asc')
            ->where('clientes.ativo', 1)->findAll();

        $tipos = $this->tipoModel->select('id,descricao')
            ->orderBy('descricao', 'asc')->findAll();

        $data = [
            'tipos' => $tipos,
            'clientes' => $clientes
        ];

        return view('certificado/index', $data);
    }
}
