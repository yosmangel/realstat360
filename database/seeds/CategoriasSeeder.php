<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nombre' => 'Semisótano']);
        DB::table('categorias')->insert(['nombre' => 'Triplex']);
        DB::table('categorias')->insert(['nombre' => 'Dúplex']);
        DB::table('categorias')->insert(['nombre' => 'Buhardilla']);
        DB::table('categorias')->insert(['nombre' => 'Ático']);
        DB::table('categorias')->insert(['nombre' => 'Estudio']);
        DB::table('categorias')->insert(['nombre' => 'Loft']);
        DB::table('categorias')->insert(['nombre' => 'Otro']);
        DB::table('categorias')->insert(['nombre' => 'Piso']);
        DB::table('categorias')->insert(['nombre' => 'Apartamento']);
        DB::table('categorias')->insert(['nombre' => 'Planta Baja']);
        DB::table('categorias')->insert(['nombre' => 'Indiferente']);
    }
}
