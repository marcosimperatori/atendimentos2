<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'clientes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = '\App\Entities\ClienteEntity';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ativo', 'cnpj', 'emailcli', 'nomecli'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nomecli'      => 'required|min_length[3]|max_length[250]|is_unique[clientes.nomecli,id,{$id}]',
        'cnpj'       => 'exact_length[18]|is_unique[clientes.cnpj,id,{$id}]',
        'emailcli'      => 'permit_empty|is_unique[clientes.emailcli,id,{$id}]',
    ];

    protected $validationMessages   = [
        'nomecli' => [
            'required'   => 'A razão social é obrigatória.',
            'min_length' => 'A razão social precisa ter ao menos 03 caracteres.',
            'max_length' => 'A razão social pode ter no máximo 250 caracteres.',
            'is_unique'  => 'Este nome de escritório já está sendo usado'
        ],
        'cnpj' => [
            'exact_length' => 'O CNPJ deve ter 18 caracteres.',
            'is_unique'    => 'O CNPJ já está sendo usado'
        ],
        'emailcli' => [
            'is_unique' => 'Este email já está sendo utilizado'
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
