<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inmueble;
use App\Agencia;
use App\Cliente;
use App\Accion;
use App\Tipo;
use App\Provincia;

class IndexController extends Controller
{
    public function index(){

    	/* Datos estadisticos de RS360 */
    	$inmuebles = Inmueble::all();
    	$ninmuebles = count($inmuebles);
    	$agencias = Agencia::all();
    	$nagencias = count($agencias);
    	$clientes = Cliente::all();
    	$nclientes = count($clientes);
    	$acciones = Accion::all();
    	$nacciones = count($acciones);
        $tipos = Tipo::all();
        $provincias = Provincia::all();
    	return view('Homepage.welcome', compact('ninmuebles','nagencias','nclientes','nacciones','tipos', 'provincias'));
    }
}
