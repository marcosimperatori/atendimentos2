<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class EscritorioEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['criado_em', 'atualizado_em', 'deleted_at'];
    protected $casts   = [];
}
