<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TipoCertificado extends Migration
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
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'preco_custo' => [
                'type' => 'DECIMAL',
                'default' => 0,
                'constraint' => '11,2',
            ],
            'preco_venda' => [
                'type' => 'DECIMAL',
                'default' => 0,
                'constraint' => '11,2',
            ],
            'midia' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'validade' => [
                'type' => 'INT',
                'contraint' => 5,
                'unsigned'       => true,
            ],
            'obs' => [
                'type' => 'TEXT',
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
        $this->forge->addUniqueKey('descricao');
        $this->forge->createTable('tipos');
    }

    public function down()
    {
        $this->forge->dropTable('tipos');
    }
}
