<?php

use Illuminate\Database\Seeder;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
        	'provincia_id'		=> 1,
        	'nombre'	=> 'Abajas'
        	]);
        DB::table('municipios')->insert([
        	'provincia_id'		=> 1,
        	'nombre'	=> 'Adrada de Haza'
        	]);
        DB::table('municipios')->insert([
        	'provincia_id'		=> 1,
        	'nombre'	=> 'Aguas Cándidas'
        	]);
    }
}
