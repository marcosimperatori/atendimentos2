<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CertificadoModel;
use App\Models\ClienteModel;
use App\Models\TipoModel;

class CertificadoController extends BaseController
{
    private $clienteModel;
    private $tipoModel;
    private $certificadoModel;

    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
        $this->tipoModel = new TipoModel();
        $this->certificadoModel = new CertificadoModel();
    }

    public function index()
    {
        return view('certificado/index');
    }

    public function emitir()
    {
        $certificados = $this->certificadoModel->select('clientes.id,clientes.nomecli,escritorios.nome')
            ->join('escritorios', 'escritorios.id = clientes.escritorio')
            ->orderBy('nomecli', 'asc')
            ->where('clientes.ativo', 1)->findAll();

        $tipos = $this->tipoModel->select('id,descricao,preco_venda,validade')
            ->orderBy('descricao', 'asc')->findAll();

        $data = [
            'tipos' => $tipos,
            'clientes' => $certificados
        ];
    }

    public function getAll()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }
        $atributos = [
            'certificados.id', 'clientes.nomecli', 'certificados.ativo',
            'certificados.validade', 'certificados.emissao_em', 'escritorios.nome', 'tipos.descricao', 'tipos.midia'
        ];
        $certificados = $this->certificadoModel->select($atributos)
            ->join('clientes', 'clientes.id = certificados.idcliente')
            ->join('tipos', 'tipos.id = certificados.idtipo')
            ->join('escritorios', 'escritorios.id = clientes.escritorio')
            ->orderBy('emissao_em', 'desc')
            ->orderBy('nomecli', 'asc')->findAll();

        $data = [];

        foreach ($certificados as $certificado) {
            $id = encrypt($certificado->id);
            $data[] = [
                'emissao'    => $certificado->emissao_em,
                'nome'       => $certificado->nomecli,
                'tipo'       => $certificado->descricao,
                'midia'      => $certificado->midia,
                'validade'   => $certificado->validade,
                'ativo'      => ($certificado->ativo == true ? '<i class="fa fa-toggle-on"></i>&nbsp;Ativo' : '<i class="fa fa-toggle-off text-secondary"></i>&nbsp;Inativo'),
                'acoes'      => '<a  href="' . base_url("certificados/editar/$id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                                 <a  href="' . base_url("certificados/deletar/$id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }
}
