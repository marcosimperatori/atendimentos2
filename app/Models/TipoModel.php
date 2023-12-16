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
        'descricao', 'preco_custo', 'preco_venda', 'obs'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'descricao'   => 'required|min_length[2]|is_unique[tipos.descricao,id,{$id}]',
        'preco_custo' => 'required',
        'preco_venda' => 'required',
    ];

    protected $validationMessages   = [
        'descricao' => [
            'required'   => 'A descrição do certificado é obrigatória',
            'min_length' => 'A descrição precisa ter ao menos 02 caracteres',
            'is_unique'  => 'Esta descrição já está sendo utilizada',
        ],
        'preco_custo' => [
            'required' => 'Informe o preço de custo'
        ],
        'preco_venda' => [
            'required' => 'Informe o preço de venda'
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
