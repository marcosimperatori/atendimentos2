<?php

namespace App\Database\Seeds;

use App\Models\EscritorioModel;
use CodeIgniter\Database\Seeder;

class EscritorioSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $escritorioModel = new EscritorioModel();

        $qtdeRegistros = 8;

        $escritoriosPush = [];

        for ($i = 0; $i < $qtdeRegistros; $i++) {

            array_push($escritoriosPush, [
                'nome'  => $faker->unique()->company(),
                'email'  => $faker->unique()->email,
                'ativo'  => $faker->numberBetween(0, 1),
                'cnpj'   => strval($faker->unique()->cnpj())
            ]);
        }

        $escritorioModel->skipValidation(true)
            ->protect(false)
            ->insertBatch($escritoriosPush);

        echo "$qtdeRegistros criados com sucesso!";
    }
}
