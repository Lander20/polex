<?php

use Illuminate\Database\Seeder;

class ProyectoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('proyectos')->insert([
            'name' => 'Proyecto 1',
            'id_usuario'=> '1'
        ]);
        DB::table('proyectos')->insert([
            'name' => 'Proyecto 2',
            'id_usuario'=> '1'
        ]);

        /*-------------------------------*/

        DB::table('proyectos')->insert([
            'name' => 'Proyecto 3',
            'id_usuario'=> '2'
        ]);
        /*-------------------------------*/
        DB::table('proyectos')->insert([
            'name' => 'Proyecto 4',
            'id_usuario'=> '3'
        ]);

    }
}
