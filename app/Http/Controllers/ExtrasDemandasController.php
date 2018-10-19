<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ExtrasDemanda;

class ExtrasDemandasController extends Controller
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
        if ($request->ajax()) {
            
            if ($request->form_seccion == 'form_calidades') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                               ->update(['calidades'       => $request->calidades,
                                         'estado_aseos'    => $request->estado_aseos,
                                         'estado_banos'    => $request->estado_banos,
                                         'estado_cocina'   => $request->estado_cocina,
                                         'estado_edificio' => $request->estado_edificio,
                                         'tipo_edificio'   => $request->tipo_edificio,
                                         'obs_calidades'   => $request->obs_calidades]);
                return response()->json(["mensaje" => "Los detalles de Calidades se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_superficies') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                      ->update([
                                'altura_desde' => $request->altura_desde,
                                'altura_hasta' => $request->altura_hasta,
                                'hab2_desde' => $request->hab2_desde,
                                'hab2_hasta' => $request->hab2_hasta,
                                'hab1_desde' => $request->hab1_desde,
                                'hab1_hasta' => $request->hab1_hasta,
                                'suites_desde' => $request->suites_desde,
                                'suites_hasta' => $request->suites_hasta,
                                'suputil_desde' => $request->suputil_desde,
                                'suputil_hasta' => $request->suputil_hasta,
                                'supcoci_desde' => $request->supcoci_desde,
                                'supcoci_hasta' => $request->supcoci_hasta,
                                'supedif_desde' => $request->supedif_desde,
                                'supedif_hasta' => $request->supedif_hasta,
                                'supsalon_desde' => $request->supsalon_desde,
                                'supsalon_hasta' => $request->supsalon_hasta,
                                'supterr_desde' => $request->supterr_desde,
                                'supterr_hasta' => $request->supterr_hasta,
                                'obs_superficies' => $request->obs_superficies]);
                return response()->json(["mensaje" => "Los detalles de Superficies y Distribución se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_carpinteria') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                      ->update(['armarios_desde' => $request->armarios_desde, 
                                'armarios_hasta' => $request->armarios_hasta, 
                                'carp_exterior' => $request->carp_exterior, 
                                'carp_interior' => $request->carp_interior, 
                                'persianas' => $request->persianas, 
                                'puerta_principal' => $request->puerta_principal, 
                                'puertas_interiores' => $request->puertas_interiores, 
                                'ventanas' => $request->ventanas, 
                                'obs_carpinteria' => $request->obs_carpinteria]);
                return response()->json(["mensaje" => "Los detalles de Carpinteria se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_acabados') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                        ->update(['acabados_paredes' => $request->acabados_paredes,
                        'paredes_banos' => $request->paredes_banos,
                        'paredes_cocina' => $request->paredes_cocina,
                        'suelos' => $request->suelos,
                        'suelos_banos' => $request->suelos_banos,
                        'suelos_cocina' => $request->suelos_cocina,
                        'techo' => $request->techo,
                        'paredes' => $request->paredes,
                        'banneras' => $request->banneras,
                        'griferia' => $request->griferia,
                        'plato_duchas' => $request->plato_duchas,
                        'sanitarios' => $request->sanitarios,
                        'obs_acabados' => $request->obs_acabados]);
                return response()->json(["mensaje" => "Los detalles de Acabados se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_instalaciones') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                    ->update(['agua' => $request->agua,
                        'gas' => $request->gas,
                        'telefono' => $request->telefono,
                        'tvyfm' => $request->tvyfm,
                        'agua_caliente' => $request->agua_caliente,
                        'cocina' => $request->cocina,
                        'electricidad' => $request->electricidad,
                        'electrodomesticos' => $request->electrodomesticos,
                        'equipamientos' => $request->equipamientos,
                        'fontaneria' => $request->fontaneria,
                        'iluminacion' => $request->iluminacion,
                        'instalaciones' => $request->instalaciones,
                        'instalaciones_edificio' => $request->instalaciones_edificio,
                        'instalaciones_privadas' => $request->instalaciones_privadas,
                        'refrigeracion' => $request->refrigeracion,
                        'interruptores' => $request->interruptores,
                        'mecanismos' => $request->mecanismos,
                        'seguridad' => $request->seguridad,
                        'tomasdeagua' => $request->tomasdeagua,
                        'obs_instalaciones' => $request->obs_instalaciones]);
                return response()->json(["mensaje" => "Los detalles de Instalaciones y Suministros se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_economicos') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                    ->update([
                        'gastos_comunidad' => $request->gastos_comunidad,
                        'calidad_precio' => $request->calidad_precio,
                        'rentabilidad' => $request->rentabilidad,
                        'obs_datoseconomicos' => $request->obs_datoseconomicos
                        ]);
                return response()->json(["mensaje" => "Los detalles de Datos Económicos se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_finca') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                    ->update([
                        'construccion' => $request->construccion,
                        'estilo_construccion' => $request->estilo_construccion,
                        'estructura' => $request->estructura,
                        'portalyescalera' => $request->portalyescalera,
                        'puerta_entrada' => $request->puerta_entrada,
                        'numfachadas' => $request->numfachadas,
                        'obs_finca' => $request->obs_finca
                        ]);
                return response()->json(["mensaje" => "Los detalles de Finca se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_situacion') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                    ->update([
                        'calif_urbana' => $request->calif_urbana,
                        'cercania_a' => $request->cercania_a,
                        'elementos_comunitarios' => $request->elementos_comunitarios,
                        'entorno' => $request->entorno,
                        'equipamientos_zonas' => $request->equipamientos_zonas,
                        'grado_urbanizacion' => $request->grado_urbanizacion,
                        'sol' => $request->sol,
                        'transportes_publicos' => $request->transportes_publicos,
                        'vistas' => $request->vistas,
                        'distancia_poblacion' => $request->distancia_poblacion,
                        'obs_situacion' => $request->obs_situacion
                        ]);
                return response()->json(["mensaje" => "Los detalles de Situación y Entorno se guardaron correctamente."]);
            };

            if ($request->form_url == 'form_url') {
                ExtrasDemanda::where('demanda_id',$request->demanda_id)
                    ->update([
                        'url' => $request->link,
                        ]);
                return response()->json(["mensaje" => "La URL del video se guardó correctamente."]);
            };
      };
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
