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
        $currentDate->modify('+30 days');

        $vencimentos = $this->certificadoModel->select('*')
            ->join('clientes', 'clientes.id = certificados.idcliente')
            ->join('escritorios', 'escritorios.id = clientes.escritorio')
            ->where('validade <=', $currentDate->format('Y-m-d'))
            ->orderBy('certificados.validade', 'asc')->orderBy('clientes.nomecli')
            ->findAll();

        $escritorios = $this->escritorioModel->select('id,nome')->orderBy('nome', 'asc')->findAll();


        $data = [
            'vencimentos' => $vencimentos,
            'escritorios' => $escritorios,
            'cert' => $this->getInfoCertificados()
        ];

        return view('home/index', $data);
    }

    public function getResumoClientes()
    {
        if (!$this->request->isAJAX()) {
            $retorno['resultado'] = 'Sem permissão de acesso!';
            return $this->response->setJSON($retorno);
        }

        $lista = $this->clienteModel->select('(select count(id) from clientes c where c.ativo=1) as ativos')
            ->select('(select count(id) from clientes c where c.ativo=0) as inativos')->findAll();

        if (!empty($lista)) {
            $data = [
                'ativos' => $lista[0]->ativos,
                'inativos' => $lista[0]->inativos
            ];
        } else {
            $data = [
                'ativos' => 0,
                'inativos' => 0
            ];
        }

        return $this->response->setJSON($data);
    }

    public function getResumoEscritorios()
    {
        if (!$this->request->isAJAX()) {
            $retorno['resultado'] = 'Sem permissão de acesso!';
            return $this->response->setJSON($retorno);
        }

        $lista = $this->escritorioModel->select('(select count(id) from escritorios c where c.ativo=1) as ativos')
            ->select('(select count(id) from escritorios c where c.ativo=0) as inativos')->findAll();

        if (!empty($lista)) {
            $data = [
                'ativos' => $lista[0]->ativos,
                'inativos' => $lista[0]->inativos
            ];
        } else {
            $data = [
                'ativos' => 0,
                'inativos' => 0
            ];
        }

        return $this->response->setJSON($data);
    }

    public function getResumoCertificados()
    {
        if (!$this->request->isAJAX()) {
            $retorno['resultado'] = 'Sem permissão de acesso!';
            return $this->response->setJSON($retorno);
        }

        $currentDate = new \DateTime();
        $dataProjetada = clone $currentDate;
        $dataProjetada->modify('+30 days');

        $lista = $this->certificadoModel
            ->select("(SELECT COUNT(id) FROM certificados c WHERE c.validade < '" . $currentDate->format('Y-m-d') . "') AS vencidos")
            ->select("(SELECT COUNT(id) FROM certificados c WHERE c.validade > '" . $currentDate->format('Y-m-d') . "') AS vigentes")
            ->select("(SELECT COUNT(id) FROM certificados c WHERE c.validade >= '" . $currentDate->format('Y-m-d') . "' AND c.validade <='" . $dataProjetada->format('Y-m-d') . "') AS renovar")
            ->findAll();


        if (!empty($lista)) {
            $data = [
                'vencidos' => $lista[0]->vencidos,
                'vigentes' => $lista[0]->vigentes,
                'renovar'  => $lista[0]->renovar,
            ];
        } else {
            $data = [
                'vencidos' => 0,
                'vigentes' => 0,
                'renovar'  => 0,
            ];
        }

        return $this->response->setJSON($data);
    }

    private function getInfoCertificados()
    {
        $currentDate = new \DateTime();
        $dataProjetada = clone $currentDate;
        $dataProjetada->modify('+30 days');

        $lista = $this->certificadoModel
            ->select("(SELECT COUNT(id) FROM certificados c WHERE c.validade < '" . $currentDate->format('Y-m-d') . "') AS vencidos")
            ->select("(SELECT COUNT(id) FROM certificados c WHERE c.validade > '" . $currentDate->format('Y-m-d') . "') AS vigentes")
            ->select("(SELECT COUNT(id) FROM certificados c WHERE c.validade >= '" . $currentDate->format('Y-m-d') . "' AND c.validade <='" . $dataProjetada->format('Y-m-d') . "') AS renovar")
            ->findAll();


        if (!empty($lista)) {
            $data = [
                'vencidos' => $lista[0]->vencidos,
                'vigentes' => $lista[0]->vigentes,
                'renovar'  => $lista[0]->renovar,
            ];
        } else {
            $data = [
                'vencidos' => 0,
                'vigentes' => 0,
                'renovar'  => 0,
            ];
        }

        return $data;
    }
}
