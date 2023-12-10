<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'email', 'senha'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    // protected $deletedField  = 'deleted_at';

    // Validation
    /*  protected $validationRules      = [
        'nomecli'      => 'required|min_length[3]|max_length[250]|is_unique[clientes.nomecli,id,{$id}]',
        'cnpj'       => 'exact_length[18]|is_unique[escritorios.cnpj,id,{$id}]',
        'emailcli'      => 'permit_empty|is_unique[escritorios.emailcli,id,{$id}]',
    ];*/

    /* protected $validationMessages   = [
        'nomecli' => [
            'required'   => 'A razão social é obrigatória.',
            'min_length' => 'A razão social precisa ter ao menos 03 caracteres.',
            'max_length' => 'A razão social pode ter no máximo 250 caracteres.',
            'is_unique'  => 'Este nome de escritório já está sendo usado'
        ],
        'cnpj' => [
            'exact_length' => 'O CNPJ pode ter no máximo 18 caracteres.',
            'is_unique'    => 'O CNPJ já está sendo usado'
        ],
        'emailcli' => [
            'is_unique' => 'Este email já está sendo utilizado'
        ],
    ];*/
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function hashPassword($data)
    {
        if (isset($data['data']['senha'])) {
            $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);

            //removendo estas posições pois não existem no banco de dados
            // unset($data['data']['password']);
            // unset($data['data']['password_confirmation']);
        }

        return $data;
    }
}
