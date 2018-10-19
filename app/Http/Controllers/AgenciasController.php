<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pais;
use App\Via;
use App\Agencia;
use Auth;

class AgenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();
        $vias = Via::all();
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();
        if (count($agencia)) {
            return view('agencias.edit', compact('paises','vias'));
        }else{
            return view('agencias.create', compact('paises','vias'));
        };
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agencia = new Agencia(); 
        $agencia->user_id = $request->user_id;
        $agencia->nombre = $request->nombre;
        $agencia->tipo_p1 = $request->tipo_p1;
        $agencia->tipo_p2 = $request->tipo_p2;
        $agencia->tipo_sociedad = $request->tipo_sociedad;
        $agencia->razon_social = $request->razon_social;
        $agencia->telefono = $request->telefono;
        $agencia->telefono_de = $request->telefono_de;
        $agencia->movil = $request->movil;
        $agencia->movil_de = $request->movil_de;
        $agencia->fax = $request->fax;
        $agencia->fax_de = $request->fax_de;
        $agencia->email = $request->email;
        $agencia->email_de = $request->email_de;
        $agencia->web = $request->web;

        // Direccion
        $agencia->pais_id = $request->pais_id;
        $agencia->codigo_postal = $request->codigo_postal;
        $agencia->municipio_id = $request->municipio_id;
        $agencia->via_id = $request->via_id;
        $agencia->calle = $request->calle;
        $agencia->numero = $request->numero;
        $agencia->piso = $request->piso;
        $agencia->escalera = $request->escalera;
        $agencia->puerta = $request->puerta;
        $agencia->notas = $request->notas;
        
        if ($agencia->save()) {
            return json_encode(['mensaje' => "Se guardaron los datos"]);
        }else{
            return json_encode(['mensaje' => "No se guardaron los datos"]);
        };
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
