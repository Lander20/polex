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
            'state'=>'1',
            'email' => 'admin@polex.cl',
            'password' => bcrypt('admin'),
            'id_perfil' => '1',
        ]);

        DB::table('Users')->insert([
            'name' => 'Alexander',
            'last_name' => 'Figueroa',
            'state'=>'1',
            'email' => 'alexander.figueroa.ramos@gmail.com',
            'password' => bcrypt('alexander'),
            'id_perfil' => '2',
        ]);
        DB::table('Users')->insert([
            'name' => 'Rodrigo',
            'last_name' => 'Gonzalez',
            'state'=>'1',
            'email' => 'rodrigo.gonzalez.zura@gmail.com',
            'password' => bcrypt('rodrigo'),
            'id_perfil' => '3',
        ]);
    }
}
