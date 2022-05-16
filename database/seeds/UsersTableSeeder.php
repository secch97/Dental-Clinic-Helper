<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Role_id' => '1',
            'nombre' => 'Administrador',
            'usuario'=>'Administrador',
            'email' => 'admin@proyecto.test',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'Role_id' => '2',
            'nombre' => 'Saúl Castillo',
            'usuario'=>'Secch97',
            'email' => 'secch97@gmail.com',
            'password' => bcrypt('123456'),
        ]);

    }
}
