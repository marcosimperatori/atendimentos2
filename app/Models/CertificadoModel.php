<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificadoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'certificados';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = '\App\Entities\CertificadoEntity';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'idcliente', 'idescritorio', 'preco_venda', 'comissao_esc', 'validade', 'ativo'
    ];


    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
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
