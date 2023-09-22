<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EscritorioAddComissao extends Migration
{
    public function up()
    {
        $fields = [
            'comissao' => [
                'type' => 'DECIMAL',
                'default' => 0,
                'constraint' => '11,2',
            ],
        ];

        $this->forge->addColumn('escritorios', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('escritorios', 'comissao');
    }
}
