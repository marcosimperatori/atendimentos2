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

    public function criar()
    {
        $escritorio = new \App\Entities\EscritorioEntity();

        $data = [
            'titulo' => "Criando novo escritório",
            'escritorio' => $escritorio,
        ];

        return view('escritorio/criar', $data);
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

        //Criando um novo objeto da entidade usuário
        $escritorio = new \App\Entities\EscritorioEntity($post);

        if ($this->escritorioModel->protect(false)->save($escritorio)) {

            //captura o id do cliente que acabou de ser inserido no banco de dados
            $retorno['id'] = $this->escritorioModel->getInsertID();
            $NovoEscritorio = $this->buscaEscritorioOu404($retorno['id']);
            session()->setFlashdata('sucesso', "O registro ($NovoEscritorio->nome) foi incluído no sistema");
            $retorno['redirect_url'] = base_url('escritorios');

            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os aviso de erro e tente novamente";
        $retorno['erros_model'] = $this->escritorioModel->errors();

        return $this->response->setJSON($retorno);
    }

    public function edit($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        $escritorio = $this->buscaEscritorioOu404($id);

        $data = [
            'titulo' => "Editando o escritório",
            'escritorio' => $escritorio,
        ];
        return view('escritorio/editar', $data);
    }

    public function atualizar()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $retorno['token'] = csrf_hash();
        $post = $this->request->getPost();
        $escritorio = $this->buscaEscritorioOu404($post['id']);
        $escritorio->fill($post);

        if ($escritorio->hasChanged() == false) {
            $retorno['info'] = "Não houve alteração no registro!";

            return $this->response->setJSON($retorno);
        }

        if ($this->escritorioModel->protect(false)->save($escritorio)) {
            session()->setFlashdata('sucesso', "O registro: $escritorio->nome foi atualizado");
            $retorno['redirect_url'] = base_url('escritorios');
            return $this->response->setJSON($retorno);
        }

        //se chegou até aqui, é porque tem erros de validação
        $retorno['erro'] = "Verifique os aviso de erro e tente novamente";
        $retorno['erros_model'] = $this->escritorioModel->errors();

        return $this->response->setJSON($retorno);
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
                'acoes'  => '<a  href="' . base_url("escritorios/editar/$id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                <a  href="' . base_url("escritorios/excluir/$id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }

    private function buscaEscritorioOu404(int $id = null)
    {
        //vai considerar inclusive os registros excluídos (softdelete)
        if (!$id || !$escritorio = $this->escritorioModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Escritório não encontrado com o ID: $id");
        }

        return $escritorio;
    }
}
