<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Escritorio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'cnpj' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ativo' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'criado_em' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'atualizado_em' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('nome');
        $this->forge->createTable('escritorios');
    }

    public function down()
    {
        $this->forge->dropTable('escritorios');
    }
}
