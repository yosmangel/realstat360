<?php

namespace App\Http\Controllers;

use App\Interno;
use App\Http\Requests;
use Illuminate\Http\Request;

class InternosController extends Controller
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
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $interno = new Interno();
            $interno->fill($request->all());
            if ($request->idu) {
                $interno->inmueble_id = $request->idu;
            }
            if ($request->agencia_id) {
                $interno->agencia_id = 1;
            }
            if ($request->agente_id) {
               $interno->agente_id = 1;
            }
            if ($request->cliente_prop_id) {
               $interno->cliente_prop_id = 1;
            }

            if ($interno->save()) {
                return response()->json(["mensaje" => "Se guardaron los datos internos del inmueble"]);
            }
        }
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
        try {
           if ($request->ajax()) {
                $interno=Interno::where('inmueble_id','=',$request->idu)->first();

                if(empty($interno)){
                    $interno=new Interno();
                    $interno->inmueble_id=$request->idu;
                }
                $interno->fill($request->all());

                if( $interno->save() ) {
                    return response()->json(["mensaje" => "La información del Inmueble ha sido actualizada.", "code"=>0]);
                }else{
                    return response()->json(["mensaje" => "Ha ocurrido un error al intentar editar la información del Inmueble." , "code"=>1]);
                }

           } 
        } catch (Exception $e) {
            return response()->json(["mensaje" => "Ha ocurrido un error al intentar editar la información del Inmueble." , "code"=>1]);
        }
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
