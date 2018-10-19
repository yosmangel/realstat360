<?php

use Illuminate\Database\Seeder;

class EntidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entidades')->insert(['nombre' => 'Banco de Valencia']);
        DB::table('entidades')->insert(['nombre' => 'Ahorro Corporación']);
        DB::table('entidades')->insert(['nombre' => 'La Caja de Canarias']);
        DB::table('entidades')->insert(['nombre' => 'Banco Herrero / Solvia']);
        DB::table('entidades')->insert(['nombre' => 'No Definida']);
    }
}
