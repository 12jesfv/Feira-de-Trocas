<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      DB::table('projetos')->truncate();
     	foreach (range(1,500) as $index) {
             DB::table('projetos')->insert([
                 'responsavel' => $faker->name,
                 'titulo' => $faker->sentence(5),
                 'descricao' => $faker->paragraph(5),
                 'observacoes' => $faker->text(),
                 'created_at' => $faker->dateTimeBetween('-2 years')
             ]);
         }
    }
}
