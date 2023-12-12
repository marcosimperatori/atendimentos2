<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tipos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = '\App\Entities\TipoEntity';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'descricao', 'preco_custo', 'preco_venda', 'validade', 'obs'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'descricao'   => 'required|min_length[2]',
        'preco_custo' => 'required',
        'preco_venda' => 'required',
        'validade'    => 'required|is_natural_no_zero'
    ];

    protected $validationMessages   = [
        'descricao' => [
            'required'   => 'A descrição do certificado é obrigatória',
            'min_length' => 'A descrição precisa ter ao menos 02 caracteres.'
        ],
        'preco_custo' => [
            'required' => 'Informe o preço de custo'
        ],
        'preco_venda' => [
            'required' => 'Informe o preço de venda'
        ],
        'validade' => [
            'required' => 'Informe validade/nº transações',
            'is_natural_no_zero' => 'Deve ser maior que zero'
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
