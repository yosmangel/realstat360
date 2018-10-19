<?php

use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paises')->insert(['nombre' => 'España']);
        DB::table('paises')->insert(['nombre' => 'Francia']);
        DB::table('paises')->insert(['nombre' => 'Andorra']);
        DB::table('paises')->insert(['nombre' => 'Portugal']);
    }
}
