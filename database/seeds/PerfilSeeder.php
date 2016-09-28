<?php

use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfils')->insert([
            'name' => 'Administrador',
            'estado'=>'1',
            'id' => '1'
        ]);

        DB::table('perfils')->insert([
            'name' => 'Perfil 1',
            'estado'=>'1',
            'id' => '2'
        ]);

        DB::table('perfils')->insert([
            'name' => 'Perfil 2',
            'estado'=>'1',
            'id' => '3'
        ]);
    }
}
