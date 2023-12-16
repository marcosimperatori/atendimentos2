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
        $tipos = $this->tipoModel->select('id,descricao')->orderBy('descricao', 'asc')->findAll();
        $data = [
            'tipos' => $tipos
        ];
        return view('tipo/index');
    }

    public function criar()
    {
        $tipo = new \App\Entities\TipoEntity();

        $data = [
            'titulo' => "Cadastrando novo certificado",
            'tipo' => $tipo,
        ];

        return view('tipo/criar', $data);
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
        $tipo = new \App\Entities\TipoEntity($post);


        if ($this->tipoModel->protect(false)->save($tipo)) {

            //captura o id do cliente que acabou de ser inserido no banco de dados
            $retorno['id'] = $this->tipoModel->getInsertID();
            //$NovoCliente = $this->buscaClienteOu404($retorno['id']);
            //session()->setFlashdata('sucesso', "O registro ($NovoCliente->nomecli) foi incluído no sistema");
            $retorno['redirect_url'] = base_url('tipos');

            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os aviso de erro e tente novamente";
        $retorno['erros_model'] = $this->tipoModel->errors();

        return $this->response->setJSON($retorno);
    }

    public function edit($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        $tipo = $this->buscaTipoOu404($id);

        $data = [
            'titulo' => "Editando certificado",
            'tipo' => $tipo,
        ];
        return view('tipo/editar', $data);
    }

    public function atualizar()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $retorno['token'] = csrf_hash();
        $post = $this->request->getPost();
        $tipo = $this->buscaTipoOu404($post['id']);
        $tipo->fill($post);

        if ($tipo->hasChanged() == false) {
            $retorno['info'] = "Não houve alteração no registro!";
            return $this->response->setJSON($retorno);
        }


        if ($this->tipoModel->protect(false)->save($tipo)) {
            session()->setFlashdata('sucesso', "O registro foi atualizado");
            $retorno['redirect_url'] = base_url('tipos');
            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os aviso de erro e tente novamente";
        $retorno['erros_model'] = $this->tipoModel->errors();

        return $this->response->setJSON($retorno);
    }

    public function deletar($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        $tipo = $this->buscaTipoOu404($id);

        $registro = $this->tipoModel->select()
            ->where('tipos.id', $tipo->id)
            ->first();

        $data = [
            'tipo' => $registro
        ];
        return view('tipo/deletar', $data);
    }

    public function confirma_exclusao($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        //faz a rotina de exclusão e redireciona para a lista de escritórios
        $this->tipoModel->delete($id);
        return redirect()->to('tipos');
    }

    public function getAll()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $tipos = $this->tipoModel->select('*')
            ->orderBy('descricao', 'asc')->findAll();
        $data = [];

        foreach ($tipos as $tipo) {
            $id = encrypt($tipo->id);
            $data[] = [
                'descricao' => $tipo->descricao,
                'custo'     => $tipo->preco_custo,
                'venda'     => $tipo->preco_venda,
                'obs'       => $tipo->obs,
                'acoes'     => '<a href="' . base_url("tipos/editar/$id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                                <a href="' . base_url("tipos/deletar/$id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }

    private function buscaTipoOu404(int $id = null)
    {
        //vai considerar inclusive os registros excluídos (softdelete)
        if (!$id || !$tipo = $this->tipoModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Certificado não encontrado com o ID: $id");
        }

        return $tipo;
    }
}
