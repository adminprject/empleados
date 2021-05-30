<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            0 => [
                'nombre'         => 'Profesional de proyectos - Desarrollador',
                'created_at'     => '2021-05-29 15:13:02',
                'updated_at'     => '2021-05-29 14:33:50',
            ],
        ]);

        \DB::table('roles')->insert([
            1 => [
                'nombre'         => 'Gerente estrategico',
                'created_at'     => '2021-05-29 15:13:02',
                'updated_at'     => '2021-05-29 14:33:50',
            ],
        ]);

        \DB::table('roles')->insert([
            2 => [
                'nombre'         => 'Auxiliar Administrativos',
                'created_at'     => '2021-05-29 15:13:02',
                'updated_at'     => '2021-05-29 14:33:50',
            ],
        ]);
    }
}
