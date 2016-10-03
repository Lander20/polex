<?php

use Illuminate\Database\Seeder;

class PlanoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planos')->insert([
            'name' => 'Plano 1',
            'id_proyecto'=>'1',
        ]);
        DB::table('planos')->insert([
            'name' => 'Plano 2',
            'id_proyecto'=>'1',
        ]);
        DB::table('planos')->insert([
            'name' => 'Plano 3',
            'id_proyecto'=>'1',
        ]);
        /*-------------------------------*/

        DB::table('planos')->insert([
            'name' => 'Plano 4',
            'id_proyecto'=>'2',
        ]);
        DB::table('planos')->insert([
            'name' => 'Plano 5',
            'id_proyecto'=>'2',
        ]);
        DB::table('planos')->insert([
            'name' => 'Plano 6',
            'id_proyecto'=>'2',
        ]);
        /*-------------------------------*/

        DB::table('planos')->insert([
            'name' => 'Plano 7',
            'id_proyecto'=>'3',
        ]);
        DB::table('planos')->insert([
            'name' => 'Plano 8',
            'id_proyecto'=>'3',
        ]);
        /*-------------------------------*/

        DB::table('planos')->insert([
            'name' => 'Plano 9',
            'id_proyecto'=>'4',
        ]);
        DB::table('planos')->insert([
            'name' => 'Plano 10',
            'id_proyecto'=>'4',
        ]);
    }
}
