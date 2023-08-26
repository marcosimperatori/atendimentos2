<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EscritorioModel;

class EscritorioController extends BaseController
{
    private $escritorioModel;

    public function __construct()
    {
        $this->escritorioModel = new EscritorioModel();
    }
    public function index()
    {
        return view('escritorio/index');
    }
    public function getAll()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }
        $atributos = ['id', 'nome', 'ativo'];
        $escritorios = $this->escritorioModel->select($atributos)
            ->orderBy('nome', 'asc')->findAll();
        $data = [];

        foreach ($escritorios as $escritorio) {
            $id = encrypt($escritorio->id);
            $data[] = [
                'nome'   => $escritorio->nome,
                'ativo'  => ($escritorio->ativo == true ? '<i class="fa fa-toggle-on"></i>&nbsp;Ativo' : '<i class="fa fa-toggle-off text-secondary"></i>&nbsp;Inativo'),
                'acoes'  => '<a  href="' . base_url("escritorio/editar/$id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                <a  href="' . base_url("escritorio/excluir/$id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }
}
