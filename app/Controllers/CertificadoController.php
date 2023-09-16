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

    public function criar()
    {
        $certificado = new \App\Entities\CertificadoEntity();
        $clientes = $this->clienteModel->select('id,nomecli')->where('ativo', 1)->orderBy('nomecli', 'asc')->findAll();
        $tipos = $this->tipoModel->select('id,descricao,midia,preco_venda,validade')->orderBy('descricao', 'asc')->findAll();

        $data = [
            'titulo' => "Cadastrando novo certificado",
            'certificado' => $certificado,
            'clientes' => $clientes,
            'tipos' => $tipos
        ];

        return view('certificado/criar', $data);
    }

    public function cadastrar()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        //atualiza o token do formulário
        $retorno['token'] = csrf_hash();

        //recuperando os dados que vieram na requisiçao
        $post = $this->request->getPost();

        //Criando um novo objeto da entidade cliente
        $certificado = new \App\Entities\CertificadoEntity($post);
        $certificado->ativo = 1;
        $certificado->comissao_esc = 1.38;

        if ($this->certificadoModel->protect(false)->save($certificado)) {

            //captura o id do cliente que acabou de ser inserido no banco de dados
            $retorno['id'] = $this->certificadoModel->getInsertID();
            //$NovoCliente = $this->buscaClienteOu404($retorno['id']);
            //session()->setFlashdata('sucesso', "O registro ($NovoCliente->nomecli) foi incluído no sistema");
            $retorno['redirect_url'] = base_url('certificados');

            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os aviso de erro e tente novamente";
        $retorno['erros_model'] = $this->certificadoModel->errors();

        return $this->response->setJSON($retorno);
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
                'emissao'    => date('d/m/Y', strtotime($certificado->emissao_em)),
                'nome'       => $certificado->nomecli,
                'tipo'       => $certificado->descricao,
                'midia'      => $certificado->midia,
                'validade'   => date('d/m/Y', strtotime($certificado->validade)),
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
