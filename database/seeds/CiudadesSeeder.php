<?php

use Illuminate\Database\Seeder;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
        	'id'		=> 1,
            'provincia_id' => 1,
        	'nombre'	=> 'Madrid'
        	]);
    }
}
