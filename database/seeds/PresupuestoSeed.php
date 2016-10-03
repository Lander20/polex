<?php

use Illuminate\Database\Seeder;

class PresupuestoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('presupuestos')->insert([
            'id_plano'=>'1',
        ]);
    }
}
