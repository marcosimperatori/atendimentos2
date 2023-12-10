<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsuarioAdd extends Migration
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
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => false
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false
            ],
            'ativo' => [
                'type'    => 'BOOLEAN',
                'default' => false,
            ],
            'senha' => [
                'type'       =>   'VARCHAR',
                'constraint' => 255,
                'null'       => false
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],
            'criado_em' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
            'atualizado_em' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['nome', 'email']);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
