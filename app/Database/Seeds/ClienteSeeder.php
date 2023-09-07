<?php

namespace App\Database\Seeds;

use App\Models\ClienteModel;
use CodeIgniter\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $clienteModel = new ClienteModel();

        $qtdeRegistros = 85;

        $clientesPush = [];

        for ($i = 0; $i < $qtdeRegistros; $i++) {

            array_push($clientesPush, [
                'nomecli'  => $faker->unique()->company(),
                'emailcli'  => $faker->unique()->email,
                'ativo'  => $faker->numberBetween(0, 1),
                'cnpj'   => strval($faker->unique()->cnpj()),
                'escritorio'  => $faker->numberBetween(2, 4)
            ]);
        }

        $clienteModel->skipValidation(true)
            ->protect(false)
            ->insertBatch($clientesPush);

        echo "$qtdeRegistros criados com sucesso!";
    }
}
