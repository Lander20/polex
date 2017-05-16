<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PerfilSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProyectoSeed::class);
        $this->call(PlanoSeed::class);
        $this->call(MaterialSeed::class);
        $this->call(InfoCubicacionSeeder::class);
        $this->call(CubicacionSeed::class);
    }
}
