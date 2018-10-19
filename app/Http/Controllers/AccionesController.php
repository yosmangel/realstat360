<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Accion;
use App\Agencia;
use App\Cliente;
use App\Demanda;
use App\Inmueble;
use App\Tipo;
use Auth;

class AccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            $acciones = Accion::all();
            return view('acciones.index', compact('acciones'));
        }else{
            return $this->show($id);
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario_id = Auth::user()->id;
        $agencia = Agencia::where('user_id', $usuario_id)->first();
        $clientes = Cliente::where('usuario_id', $usuario_id)->get();
        $inmuebles = Inmueble::where('usuario_id', $usuario_id)->get();
        $inmuebles->each(function($inmuebles){
            $inmuebles->tipo;
            $inmuebles->municipio;
            $inmuebles->pais;
        });
        $demandas = Demanda::all();
        $demandas->each(function($demandas){
            $demandas->inmueble;
        });
        $tipos = Tipo::all();
        $zonas = [];
            foreach ($demandas as $demanda) {
                if ($demanda->inmueble_id > 0) {
                    $inmueble = $demanda->inmueble;
                    $zona = $inmueble->zona;
                }else{
                    $zona = $demanda->zona;
                }
                 $zonas[$demanda->id] = $zona;
            }
        return view('acciones.create', compact('agencia', 'clientes','inmuebles', 'demandas', 'tipos','zonas'));
    }

    public function agenda()
    {
        return view('acciones.agenda');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
