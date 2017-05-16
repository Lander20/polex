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
            'name'=>'material 1'
        ]);
        DB::table('materials')->insert([
            'name'=>'material 2'
        ]);
        DB::table('materials')->insert([
            'name'=>'material 3'
        ]);
        DB::table('materials')->insert([
            'name'=>'material 4'
        ]);
        DB::table('materials')->insert([
            'name'=>'material 5'
        ]);
        DB::table('materials')->insert([
            'name'=>'material 6'
        ]);
    }
}
