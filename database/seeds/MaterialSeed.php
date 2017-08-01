<?php

use Illuminate\Database\Seeder;

class MaterialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'name'=>'material 1',
            'price'=>3000
        ]);
        DB::table('materials')->insert([
            'name'=>'material 2',
            'price'=>2000
        ]);
        DB::table('materials')->insert([
            'name'=>'material 3',
            'price'=>500
        ]);
        DB::table('materials')->insert([
            'name'=>'material 4',
            'price'=>3000
        ]);
        DB::table('materials')->insert([
            'name'=>'material 5',
            'price'=>1000
        ]);
        DB::table('materials')->insert([
            'name'=>'material 6',
            'price'=>1500
        ]);
    }
}
