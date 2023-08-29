<?php

namespace App\Models;

use CodeIgniter\Model;

class EscritorioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'escritorios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = '\App\Entities\EscritorioEntity';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ativo', 'cnpj', 'email', 'nome', 'telefone'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nome'      => 'required|min_length[3]|max_length[250]|is_unique[escritorios.nome,id,{$id}]',
        'cnpj'       => 'exact_length[18]|is_unique[escritorios.cnpj,id,{$id}]',
        'email'      => 'permit_empty|is_unique[escritorios.email,id,{$id}]',
    ];

    protected $validationMessages   = [
        'nome' => [
            'required'   => 'A razão social é obrigatória.',
            'min_length' => 'A razão social precisa ter ao menos 03 caracteres.',
            'max_length' => 'A razão social pode ter no máximo 250 caracteres.',
            'is_unique'  => 'Este nome de escritório já está sendo usado'
        ],
        'cnpj' => [
            'exact_length' => 'O CNPJ pode ter no máximo 18 caracteres.',
            'is_unique'    => 'O CNPJ já está sendo usado'
        ],
        'email' => [
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
