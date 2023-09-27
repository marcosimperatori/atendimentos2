<?php

namespace App\Controllers;

use App\Models\CertificadoModel;
use App\Models\ClienteModel;
use App\Models\EscritorioModel;
use DateTime;

class Home extends BaseController
{
    private $certificadoModel;
    private $clienteModel;
    private $escritorioModel;

    public function __construct()
    {
        $this->certificadoModel = new CertificadoModel();
        $this->clienteModel = new ClienteModel();
        $this->escritorioModel = new EscritorioModel();
    }



    public function index(): string
    {
        $currentDate = new \DateTime();

        $vencimentos = $this->certificadoModel->select('*')
            ->join('clientes', 'clientes.id = certificados.idcliente')
            ->where('validade <=', $currentDate->format('Y-m-d'))
            ->orderBy('certificados.validade', 'desc')->orderBy('clientes.nomecli')
            ->findAll();

        $data = [
            'vencimentos' => $vencimentos,
        ];

        return view('home/index', $data);
    }

    private function getClientes()
    {
        $escritorios = [];

        $ativos   = $this->escritorioModel->selectCount('id')->where('ativo', '1');
        $inativos = $this->escritorioModel->selectCount('id')->where('ativo', '0');
    }
}
