<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
            'name' => 'Administrador',
            'last_name' => '',
            'estado'=>'1',
            'email' => 'admin@polex.cl',
            'password' => bcrypt('admin'),
            'perfil_id' => '1',
        ]);

        DB::table('Users')->insert([
            'name' => 'Alexander',
            'last_name' => 'Figueroa',
            'estado'=>'1',
            'email' => 'alexander.figueroa.ramos@gmail.com',
            'password' => bcrypt('alexander'),
            'perfil_id' => '2',
        ]);
        DB::table('Users')->insert([
            'name' => 'Rodrigo',
            'last_name' => 'Gonzalez',
            'estado'=>'1',
            'email' => 'rodrigo.gonzalez.zura@gmail.com',
            'password' => bcrypt('rodrigo'),
            'perfil_id' => '3',
        ]);
    }
}
