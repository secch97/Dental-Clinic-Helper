<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre_rol' => 'Administrador',
            'auxiliar' => 'Administrador',
        ]);

        DB::table('roles')->insert([
            'nombre_rol' => 'Usuario',
            'auxiliar' => 'Usuario',
        ]);
    }
}
