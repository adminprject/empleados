<?php

use Illuminate\Database\Seeder;

class EmpleadoRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('empleado_rol')->insert([
            0 => [
                'empleado_id'          => 1,
                'rol_id'               => 1,

            ],
        ]);
    }
}
