<?php

use Illuminate\Database\Seeder;

class AgenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencias')->insert([
        	'user_id' => 1,
        	'nombre' => 'DemoAdmin'
        	]);
        DB::table('agencias')->insert([
            'user_id' => 2,
            'nombre' => 'DemoPropietario'
            ]);
        DB::table('agencias')->insert([
            'user_id' => 3,
            'nombre' => 'DemoDemanda'
            ]);
        DB::table('agencias')->insert([
            'user_id' => 4,
            'nombre' => 'DemoProfesional'
            ]);
    }
}
