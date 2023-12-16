<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CertificadoModel;
use App\Models\ClienteModel;
use App\Models\EscritorioModel;

class ClienteController extends BaseController
{
    private $clienteModel;
    private $escritorioModel;

    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
        $this->escritorioModel = new EscritorioModel();
    }

    public function index()
    {
        return view('cliente/index');
    }

    private function getEscritorios()
    {
        $escritorios = $this->escritorioModel->select('id,nome')->where('ativo', '1')->orderBy('nome', 'asc')->findAll();
        return $escritorios;
    }

    public function criar()
    {
        $cliente = new \App\Entities\ClienteEntity();
        $escritorios = $this->getEscritorios();

        $data = [
            'titulo' => "Criando novo cliente",
            'cliente' => $cliente,
            'escritorios' => $escritorios
        ];

        return view('cliente/criar', $data);
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
        $cliente = new \App\Entities\ClienteEntity($post);

        if ($this->clienteModel->protect(false)->save($cliente)) {

            //captura o id do cliente que acabou de ser inserido no banco de dados
            $retorno['id'] = $this->clienteModel->getInsertID();
            $NovoCliente = $this->buscaClienteOu404($retorno['id']);
            session()->setFlashdata('sucesso', "O registro ($NovoCliente->nomecli) foi incluído no sistema");
            $retorno['redirect_url'] = base_url('clientes');

            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os aviso de erro e tente novamente";
        $retorno['erros_model'] = $this->clienteModel->errors();

        return $this->response->setJSON($retorno);
    }

    private function historicoCliente($idCliente = null)
    {
        $certificados = new CertificadoModel();
        $historico = $certificados->select('tipos.descricao, certificados.emissao_em, certificados.validade,certificados.preco_venda,certificados.comissao_esc')
            ->join('tipos', 'tipos.id = certificados.idtipo')
            ->where('idcliente', $idCliente)
            ->orderBy('emissao_em', 'desc')->findAll();
        return $historico;
    }

    public function edit($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        $cliente = $this->buscaClienteOu404($id);
        $escritorios = $this->getEscritorios();
        $historicos = $this->historicoCliente($id);

        $data = [
            'titulo' => "Editando o escritório",
            'cliente' => $cliente,
            'escritorios' => $escritorios,
            'historicos' => $historicos
        ];
        return view('cliente/editar', $data);
    }

    public function atualizar()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $retorno['token'] = csrf_hash();
        $post = $this->request->getPost();
        $cliente = $this->buscaClienteOu404($post['id']);
        $cliente->fill($post);

        if ($cliente->hasChanged() == false) {
            $retorno['info'] = "Não houve alteração no registro!";
            return $this->response->setJSON($retorno);
        }

        if ($this->clienteModel->protect(false)->save($cliente)) {
            session()->setFlashdata('sucesso', "O registro: $cliente->nomecli foi atualizado");
            $retorno['redirect_url'] = base_url('clientes');
            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os aviso de erro e tente novamente";
        $retorno['erros_model'] = $this->clienteModel->errors();

        return $this->response->setJSON($retorno);
    }

    public function deletar($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        $cliente = $this->buscaClienteOu404($id);
        $data = [
            'cliente' => $cliente
        ];
        return view('cliente/deletar', $data);
    }

    public function confirma_exclusao($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        //faz a rotina de exclusão e redireciona para a lista de escritórios
        $this->clienteModel->delete($id);
        return redirect()->to('clientes');
    }

    public function getAll()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }
        $atributos = ['clientes.id', 'clientes.nomecli', 'clientes.ativo', 'escritorios.nome'];
        $clientes = $this->clienteModel->select($atributos)
            ->join('escritorios', 'escritorios.id = clientes.escritorio')
            ->orderBy('nomecli', 'asc')->findAll();

        $data = [];

        foreach ($clientes as $cliente) {
            $id = encrypt($cliente->id);
            $data[] = [
                'nome'       => $cliente->nomecli,
                'escritorio' => $cliente->nome,
                'ativo'      => ($cliente->ativo == true ? '<i class="fas fa-lightbulb text-success"></i>&nbsp;Ativo' : '<i class="fas fa-lightbulb text-secondary"></i>&nbsp;Inativo'),
                'acoes'      => '<a  href="' . base_url("clientes/editar/$id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                                 <a  href="' . base_url("clientes/deletar/$id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }

    private function buscaClienteOu404(int $id = null)
    {
        //vai considerar inclusive os registros excluídos (softdelete)
        if (!$id || !$cliente = $this->clienteModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Cliente não encontrado com o ID: $id");
        }

        return $cliente;
    }

    public function resumoClientes()
    {
        if (!$this->request->isAJAX()) {
            $retorno['resultado'] = 'Sem permissão de acesso!';
            return $this->response->setJSON($retorno);
        }

        //atualiza o token do formulário
        $retorno['token'] = csrf_hash();

        $dados = $this->request->getGet();
        $retorno['valor'] =  $this->totalClientes($dados['periodo']);

        return $this->response->setJSON($retorno);
    }

    private function totalClientes($ativo)
    {

        try {
            $total = $this->clienteModel->selectCount('id', 'total')
                ->where('ativo', $ativo)
                ->get()->getResult();

            if (!empty($total)) {
                return  $total[0]->total;
            } else {
                return 0;
            }
        } catch (\Exception $e) {
            return 0;
        }
    }
}
