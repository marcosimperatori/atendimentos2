<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EscritorioAddTelefone extends Migration
{
    public function up()
    {
        $fields = [
            'telefone' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
        ];

        $this->forge->addColumn('escritorios', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('escritorios', 'telefone');
    }
}
