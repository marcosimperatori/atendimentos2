<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmissaoCertificado extends Migration
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
            'idcliente' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
            ],
            'idtipo' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
            ],
            'preco_venda' => [
                'type' => 'DECIMAL',
                'default' => 0,
                'constraint' => '11,2',
            ],
            'comissao_esc' => [
                'type' => 'DECIMAL',
                'default' => 0,
                'constraint' => '11,2',
            ],
            'emissao_em' => [
                'type' => 'DATE',
                'null' => true
            ],
            'validade' => [
                'type' => 'DATE',
                'null' => true
            ],
            'ativo' => [
                'type' => 'BOOLEAN',
                'default' => false
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('idcliente', 'clientes', 'id', 'CASCADE', 'CASCADE', 'certificado_cliente');
        $this->forge->addForeignKey('idtipo', 'tipos', 'id', 'CASCADE', 'CASCADE', 'certificado_tipo');
        $this->forge->createTable('certificados');
    }

    public function down()
    {
        $this->forge->dropTable('clientes');
    }
}
