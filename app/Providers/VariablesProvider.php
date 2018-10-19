<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Pais;
use App\Idioma;
use App\Provincia;
use App\Ciudad;
use App\Municipio;
use App\Via;
use App\Tipo;
use App\Categoria;

class VariablesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['inmuebles.create',
                          'inmuebles.crearinmueble',
                          'inmuebles.edit',
                          'demandas.create',
                          'promociones.create',
                          'Homepage.propietaries.create',
                          'Homepage.propietaries.edit',
                          'Homepage.demands.preferences',
                          'Homepage.users.profile',
                          'Homepage.propietaries.preferences'], function($view){
            $paises = Pais::all();
            $idiomas = Idioma::all();
            $municipios = Municipio::all();
            $provincias = Provincia::all();
            $ciudades = Ciudad::all();
            $vias = Via::all();
            $tipos = Tipo::all();
            $categorias = Categoria::all();
            $pisos = [0 => 'Principal',1 => '1ro',2 =>'2do',3=>'3ro',4=>'4to',5=>'5to',6=>'Sótano',7=>'Subsótano',8=>'Bajos',9=>'Entresuelo'];
            
            $view->with('paises', $paises)
                 ->with('idiomas', $idiomas)
                 ->with('municipios', $municipios)
                 ->with('provincias', $provincias)
                 ->with('ciudades', $ciudades)
                 ->with('vias', $vias)
                 ->with('tipos', $tipos)
                 ->with('pisos', $pisos)
                 ->with('categorias', $categorias);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
