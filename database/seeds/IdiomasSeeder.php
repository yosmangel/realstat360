<?php

use Illuminate\Database\Seeder;

class IdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('idiomas')->insert(['nombre' => 'Español']);
        DB::table('idiomas')->insert(['nombre' => 'Francés']);
        DB::table('idiomas')->insert(['nombre' => 'Inglés']);
        DB::table('idiomas')->insert(['nombre' => 'Portugués']);
    }
}
