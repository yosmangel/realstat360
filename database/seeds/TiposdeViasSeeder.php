<?php

use Illuminate\Database\Seeder;

class TiposdeViasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vias')->insert(['nombre' => 'Calle']);
        DB::table('vias')->insert(['nombre' => 'Paseo']);
        DB::table('vias')->insert(['nombre' => 'Avenida']);
        DB::table('vias')->insert(['nombre' => 'Ronda']);
    }
}
