<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('areas')->insert([
            0 => [
                'nombre'         => 'Administracion',
                'created_at'     => '2021-05-29 15:13:02',
                'updated_at'     => '2021-05-29 14:33:50',
            ],
        ]);

        \DB::table('areas')->insert([
            0 => [
                'nombre'         => 'Diseño',
                'created_at'     => '2021-05-29 15:13:02',
                'updated_at'     => '2021-05-29 14:33:50',
            ],
        ]);

        \DB::table('areas')->insert([
            0 => [
                'nombre'         => 'Pruebas',
                'created_at'     => '2021-05-29 15:13:02',
                'updated_at'     => '2021-05-29 14:33:50',
            ],
        ]);

        \DB::table('areas')->insert([
            0 => [
                'nombre'         => 'Sistemas',
                'created_at'     => '2021-05-29 15:13:02',
                'updated_at'     => '2021-05-29 14:33:50',
            ],
        ]);
    }
}
