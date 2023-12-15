<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CertificadoModel;
use App\Models\ClienteModel;
use App\Models\EscritorioModel;
use App\Models\TipoModel;
use DateInterval;
use DateTime;
use Doctrine\Common\Annotations\Annotation\Target;

class CertificadoController extends BaseController
{
    private $clienteModel;
    private $tipoModel;
    private $certificadoModel;
    private $escritorioModel;

    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
        $this->tipoModel = new TipoModel();
        $this->certificadoModel = new CertificadoModel();
        $this->escritorioModel = new EscritorioModel();
    }

    public function index()
    {
        return view('certificado/index');
    }

    public function criar()
    {
        $certificado = new \App\Entities\CertificadoEntity();
        $clientes = $this->clienteModel->select('id,nomecli')->where('ativo', 1)->orderBy('nomecli', 'asc')->findAll();
        $tipos = $this->tipoModel->select('id,descricao,preco_venda,validade')->orderBy('descricao', 'asc')->findAll();

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

        $escritorio = $this->escritorioModel->select('escritorios.comissao')
            ->join('clientes', 'clientes.escritorio = escritorios.id')
            ->where('clientes.id', $certificado->idcliente)->first();

        $percentual_comissao = $escritorio->comissao;

        $certificado->comissao_esc = ($certificado->preco_venda * $percentual_comissao / 100);

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

    public function edit($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        $certificado = $this->buscaCertificadoOu404($id);
        $clientes = $this->clienteModel->select('id,nomecli')->where('ativo', 1)->orderBy('nomecli', 'asc')->findAll();
        $tipos = $this->tipoModel->select('id,descricao,midia,preco_venda,validade')->orderBy('descricao', 'asc')->findAll();

        $data = [
            'titulo' => "Editando certificado",
            'certificado' => $certificado,
            'clientes' => $clientes,
            'tipos' => $tipos
        ];
        return view('certificado/editar', $data);
    }

    public function atualizar()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $retorno['token'] = csrf_hash();
        $post = $this->request->getPost();
        $certificado = $this->buscaCertificadoOu404($post['id']);

        $escritorio = $this->escritorioModel->select('escritorios.comissao')
            ->join('clientes', 'clientes.escritorio = escritorios.id')
            ->where('clientes.id', $certificado->idcliente)->first();

        $percentual_comissao = $escritorio->comissao;
        $certificado->fill($post);

        $venda = (floatval($certificado->preco_venda) * $percentual_comissao / 100);

        $certificado->comissao_esc = $venda; //number_format($venda, 2, ',', '.');

        if ($certificado->hasChanged() == false) {
            $retorno['info'] = "Não houve alteração no registro!";
            return $this->response->setJSON($retorno);
        }

        if ($this->certificadoModel->protect(false)->save($certificado)) {
            session()->setFlashdata('sucesso', "O registro foi atualizado");
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

    public function deletar($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        $certificado = $this->buscaCertificadoOu404($id);

        $registro = $this->certificadoModel->select('clientes.nomecli,tipos.descricao,tipos.midia,certificados.emissao_em,certificados.validade,certificados.id')
            ->join('clientes', 'clientes.id = certificados.idcliente')
            ->join('tipos', 'tipos.id = certificados.idtipo')
            ->where('certificados.id', $certificado->id)
            ->first();

        $data = [
            'certificado' => $registro
        ];
        return view('certificado/deletar', $data);
    }

    public function confirma_exclusao($enc_id)
    {
        $id = decrypt($enc_id);
        if (!$id) {
            return redirect()->to('home');
        }

        //faz a rotina de exclusão e redireciona para a lista de escritórios
        $this->certificadoModel->delete($id);
        return redirect()->to('certificados');
    }

    public function getAll()
    {
        //garatindo que este método seja chamado apenas via ajax
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }
        $atributos = [
            'certificados.id', 'clientes.nomecli', 'certificados.ativo',
            'certificados.validade', 'certificados.emissao_em', 'escritorios.nome', 'tipos.descricao'
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
                'validade'   => date('d/m/Y', strtotime($certificado->validade)),
                'ativo'      => ($certificado->ativo == true ? '<i class="fa fa-toggle-on text-success"></i>&nbsp;Vigente' : '<i class="fa fa-toggle-off text-secondary"></i>&nbsp;Vencido'),
                'acoes'      => '<a  href="' . base_url("certificados/editar/$id") . '" title="Editar"><i class="fas fa-edit text-success"></i></a> &nbsp; 
                                 <a  href="' . base_url("certificados/deletar/$id") . '" title="Excluir"><i class="fas fa-trash-alt text-danger"></i></a>'
            ];
        }

        $retorno = [
            'data' => $data
        ];

        return $this->response->setJSON($retorno);
    }

    public function getCertificadosARenovar()
    {
        $dataAtual = new DateTime();
        $dataAtual->add(new DateInterval('P30D'));
        $dataFormatada = $dataAtual->format('Y-m-d');

        $consulta = $this->certificadoModel->select('*')
            ->where('validade <=', $dataFormatada)
            ->orderBy('validade', 'asc')->findAll();
        dd($consulta);
        return $consulta;
    }

    public function consultar()
    {
        $clientes = $this->clienteModel->select('id,nomecli')->orderBy('nomecli', 'asc')->findAll();
        $escritorios = $this->escritorioModel->select('id,nome')->orderBy('nome', 'asc')->findAll();

        $data = [
            'escritorios' => $escritorios,
            'clientes' => $clientes,
        ];

        return view('certificado/consulta', $data);
    }

    public function buscaAvancada()
    {
        if (!$this->request->isAJAX()) {
            $retorno['resultado'] = 'Sem permissão de acesso!';
            return $this->response->setJSON($retorno);
        }

        //atualiza o token do formulário
        $retorno['token'] = csrf_hash();

        $dados = $this->request->getPost();

        $escritorio = $dados['escritorio'];
        $inicio = $dados['inicio'];
        $final = $dados['final'];
        $data = [];

        $atributos = [
            'certificados.id', 'clientes.nomecli', 'certificados.ativo',
            'certificados.validade', 'certificados.emissao_em', 'escritorios.nome', 'tipos.descricao', 'tipos.midia'
        ];

        $certificados = $this->certificadoModel->select($atributos)
            ->join('clientes', 'clientes.id = certificados.idcliente')
            ->join('tipos', 'tipos.id = certificados.idtipo')
            ->join('escritorios', 'escritorios.id = clientes.escritorio')
            ->where('escritorios.id', $escritorio)
            ->where('certificados.validade >=', $inicio)
            ->where('certificados.validade <=', $final)
            ->orderBy('emissao_em', 'desc')
            ->orderBy('nomecli', 'asc')->findAll();

        if (!empty($certificados)) {
            $mpdf = new \Mpdf\Mpdf();
            $html = '';

            foreach ($certificados as $certificado) {
                $html .= "<p>" . $certificado->nomecli . " (válido até: " . $certificado->validade . ")" . "</p>";
                $data[] = [
                    'nome' => $certificado->nomecli,
                    'tipo'    => $certificado->descricao,
                    'validade' => date('d/m/Y', strtotime($certificado->validade)),
                ];
            }
            $date = new DateTime();
            $time = $date->format('d/m/Y H:i:s');
            $mpdf->SetHeader('PDF Teste - ' . MY_APP . ' - Gerado em ' . $time);
            $mpdf->WriteHTML($html);

            $pdfPath = str_replace('\\', '/', WRITEPATH . 'temp/vecimentos.pdf');
            $mpdf->Output($pdfPath, \Mpdf\Output\Destination::FILE);

            $retorno['data'] = $data;
            $retorno['redirect_url'] = "<a href=\"" . base_url('certificados/pdf/' . base64_encode($pdfPath)) . "\" target=\"_blank\">Clique aqui para ver seu relatório</a>";
            return $this->response->setJSON($retorno);
        }

        $retorno['info'] = "Não foi possível localizar registros com o filtro informado!";
        return $this->response->setJSON($retorno);
    }

    public function exibirPDF($pdfPath)
    {
        $pdfPath = base64_decode($pdfPath);

        if (file_exists($pdfPath)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition:  attachment; filename="relatorio_vectos.pdf"');
            header('Content-Length: ' . filesize($pdfPath));
            readfile($pdfPath);
            unlink($pdfPath);
        } else {
            echo 'O arquivo PDF não foi encontrado.';
        }
    }


    public function gerarPdf()
    {
        $atributos = [
            'certificados.id', 'clientes.nomecli', 'certificados.ativo',
            'certificados.validade', 'certificados.emissao_em', 'escritorios.nome', 'tipos.descricao', 'tipos.midia'
        ];

        $certificados = $this->certificadoModel->select($atributos)
            ->join('clientes', 'clientes.id = certificados.idcliente')
            ->join('tipos', 'tipos.id = certificados.idtipo')
            ->join('escritorios', 'escritorios.id = clientes.escritorio')
            ->where('escritorios.id', 21)
            ->orderBy('emissao_em', 'desc')
            ->orderBy('nomecli', 'asc')->findAll();

        $data = [];
        $mpdf = new \Mpdf\Mpdf();
        $html = '';

        foreach ($certificados as $certificado) {
            $html .= "<p>" . $certificado->nomecli . "</p>"; //view('html_to_pdf', []);

        }
        $mpdf->SetHeader('Meu PDF - ' . MY_APP);
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('relatorio_vectos.pdf', 'I'); // opens in browser
        //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
        //return view('welcome_message');
    }

    private function buscaCertificadoOu404(int $id = null)
    {
        //vai considerar inclusive os registros excluídos (softdelete)
        if (!$id || !$certificado = $this->certificadoModel->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Certificado não encontrado com o ID: $id");
        }

        return $certificado;
    }
}
