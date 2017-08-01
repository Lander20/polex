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
            'description'=>'Es el encargado de Administrar todo el sistema, puede ver, modificar, borrar y desactivar, segun corresponda la sección',
            'id' => '1'
        ]);

        DB::table('perfils')->insert([
            'name' => 'Cubicador',
            'description'=>'El el encargado de cubicar y bla bla bla bla ....',
            'id' => '2'
        ]);

        DB::table('perfils')->insert([
            'name' => 'Revisor',
            'description'=>'Es el encargado de revisar y aprobar cubicaciones por plano, permitiendo asi generar informes de prespuesto por plano o por proyecto.',
            'id' => '3'
        ]);
    }
}
