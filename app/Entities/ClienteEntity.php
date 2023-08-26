<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ClienteEntity extends Entity
{
    protected $dates   = ['criado_em', 'atualizado_em', 'deleted_at'];
}
