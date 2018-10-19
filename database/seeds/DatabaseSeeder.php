<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuariosSeeder::class);
        //$this->call(PaisesSeeder::class);
        //$this->call(ProvinciasSeeder::class);
        //$this->call(CiudadesSeeder::class);
        //$this->call(TiposdeViasSeeder::class);
        //$this->call(IdiomasSeeder::class);
        //$this->call(EntidadesSeeder::class);
        //$this->call(TiposSeeder::class);
        //$this->call(CategoriasSeeder::class);
        //$this->call(AgenciasSeeder::class);
        //$this->call(InmueblesSeeder::class);
    }
}
