<?php

use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 45; $i++) {
           \DB::table('empleados')->insert([
                $i => [
                    'nombre'         => $faker->name,
                    'email'          => $faker->email,
                    'sexo'          => $faker->randomElement(['M','F']),
                    'area_id'          => $faker->randomElement([1, 2, 3]),
                    'boletin'          => $faker->randomElement([0, 1]),
                    'descripcion'          => $faker->text(200),
                    'created_at'     => '2021-05-29 15:13:02',
                    'updated_at'     => '2021-05-29 14:33:50',
                ],
            ]);
        }
        
    }
}
