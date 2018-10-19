<?php

use Illuminate\Database\Seeder;

class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->insert([
        	'pais_id'		=> 1,
        	'nombre'	=> 'Madrid'
        	]);
        DB::table('provincias')->insert([
        	'pais_id'		=> 1,
        	'nombre'	=> 'Salamanca'
        	]);
        DB::table('provincias')->insert([
        	'pais_id'		=> 1,
        	'nombre'	=> 'Barcelona'
        	]);
    }
}
