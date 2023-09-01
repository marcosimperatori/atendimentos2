<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EscritorioAddObs extends Migration
{
    public function up()
    {
        $fields = [
            'obs' => [
                'type' => 'TEXT',
            ],
        ];

        $this->forge->addColumn('escritorios', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('escritorios', 'obs');
    }
}
