<?php

use Illuminate\Database\Seeder;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('tipos')->insert(['nombre' => 'Piso']);
        DB::table('tipos')->insert(['nombre' => 'Casa']);
        DB::table('tipos')->insert(['nombre' => 'Local']);
        DB::table('tipos')->insert(['nombre' => 'Oficina']);
    }
}
