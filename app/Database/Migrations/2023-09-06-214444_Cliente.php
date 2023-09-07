<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cliente extends Migration
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
            'escritorio' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true
            ],
            'cnpj' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nomecli' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'emailcli' => [
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
        $this->forge->addUniqueKey('nomecli');
        $this->forge->addForeignKey('escritorio', 'escritorios', 'id', 'CASCADE', 'CASCADE', 'cliente_escritorio');
        $this->forge->createTable('clientes');
    }

    public function down()
    {
        $this->forge->dropTable('clientes');
    }
}
