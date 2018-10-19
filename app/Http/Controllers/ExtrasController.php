<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Extra;

class ExtrasController extends Controller
{


    public function create()
    { 
    	$extras = new Extras();
    	return view('extras.create');
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
        
        Extra::where('inmueble_id',$request->inmueble_id)
                         ->update(['calidades' => $request->calidades,
                                 'estado_aseos' => $request->estado_aseos,
                                 'estado_banos' => $request->estado_banos,
                                 'estado_cocina' => $request->estado_cocina,
                                 'estado_edificio' => $request->estado_edificio,
                                 'tipo_edificio' => $request->tipo_edificio,
                                 'obs_calidades' => $request->obs_calidades]);

        
        /*$extras->calidades = $request->calidades;
        $extras->estado_aseos = $request->estado_aseos;
        $extras->estado_banos = $request->estado_banos;
        $extras->estado_cocina = $request->estado_cocina;
        $extras->estado_edificio = $request->estado_edificio;
        $extras->tipo_edificio = $request->tipo_edificio;
        $extras->obs_calidades = $request->obs_calidades;*/

       // $extras->update();
        return response()->json(["mensaje" => "El registro se guardo correctamente"]);
        /*if ($extras->update()) {
          	return response()->json(["mensaje" => "El registro se guardó correctamente"]);
        }else{
            return response()->json(["mensaje" => "Error al actializar el registro"]);
        };*/
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
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	
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
                Extra::where('inmueble_id',$request->inmueble_id)
                               ->update(['calidades'       => $request->calidades,
                                         'estado_aseos'    => $request->estado_aseos,
                                         'estado_banos'    => $request->estado_banos,
                                         'estado_cocina'   => $request->estado_cocina,
                                         'estado_edificio' => $request->estado_edificio,
                                         'tipo_edificio'   => $request->tipo_edificio,
                                         'obs_calidades'   => $request->obs_calidades,
                                         'calidades_ok'    => 1]);
                return response()->json(["mensaje" => "Los detalles de Calidades se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_superficies') {
                Extra::where('inmueble_id',$request->inmueble_id)
                      ->update(['altura'                => $request->altura,
                                'num_hab_dobles'        => $request->num_hab_dobles,
                                'num_hab_individuales'  => $request->num_hab_individuales,
                                'num_suites'            => $request->num_suites,
                                'sup_util'              => $request->sup_util,
                                'sup_cocina'            => $request->sup_cocina,
                                'sup_edificada'         => $request->sup_edificada,
                                'sup_salon'             => $request->sup_salon,
                                'sup_terrazas'          => $request->sup_terrazas,
                                'obs_superficies'       => $request->obs_superficies,
                                'supydist_ok'           => 1]);
                return response()->json(["mensaje" => "Los detalles de Superficies y Distribución se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_carpinteria') {
                Extra::where('inmueble_id',$request->inmueble_id)
                      ->update(['num_armarios'      => $request->num_armarios, 
                                'carp_exterior'     => $request->carp_exterior, 
                                'carp_interior'     => $request->carp_interior, 
                                'persianas'         => $request->persianas, 
                                'puerta_principal'  => $request->puerta_principal, 
                                'puertas_interiores'=> $request->puertas_interiores, 
                                'ventanas'          => $request->ventanas, 
                                'obs_carpinteria'   => $request->obs_carpinteria,
                                'carpinteria_ok'    => 1]);
                return response()->json(["mensaje" => "Los detalles de Carpinteria se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_acabados') {
                Extra::where('inmueble_id',$request->inmueble_id)
                        ->update(['acabados_paredes'  => $request->acabados_paredes,
                        'paredes_banos'               => $request->paredes_banos,
                        'paredes_cocina'              => $request->paredes_cocina,
                        'suelos'                      => $request->suelos,
                        'suelos_banos'                => $request->suelos_banos,
                        'suelos_cocina'               => $request->suelos_cocina,
                        'techo'                       => $request->techo,
                        'paredes'                     => $request->paredes,
                        'banneras'                    => $request->banneras,
                        'griferia'                    => $request->griferia,
                        'plato_duchas'                => $request->plato_duchas,
                        'sanitarios'                  => $request->sanitarios,
                        'obs_acabados'                => $request->obs_acabados,
                        'acabados_ok'                 => 1]);
                return response()->json(["mensaje" => "Los detalles de Acabados se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_instalaciones') {
                Extra::where('inmueble_id',$request->inmueble_id)
                    ->update(['agua'              => $request->agua,
                        'gas'                     => $request->gas,
                        'telefono'                => $request->telefono,
                        'tvyfm'                   => $request->tvyfm,
                        'agua_caliente'           => $request->agua_caliente,
                        'cocina'                  => $request->cocina,
                        'electricidad'            => $request->electricidad,
                        'electrodomesticos'       => $request->electrodomesticos,
                        'equipamientos'           => $request->equipamientos,
                        'fontaneria'              => $request->fontaneria,
                        'iluminacion'             => $request->iluminacion,
                        'instalaciones'           => $request->instalaciones,
                        'instalaciones_edificio'  => $request->instalaciones_edificio,
                        'instalaciones_privadas'  => $request->instalaciones_privadas,
                        'refrigeracion'           => $request->refrigeracion,
                        'interruptores'           => $request->interruptores,
                        'mecanismos'              => $request->mecanismos,
                        'seguridad'               => $request->seguridad,
                        'tomasdeagua'             => $request->tomasdeagua,
                        'obs_instalaciones'       => $request->obs_instalaciones,
                        'instysum_ok'             => 1]);
                return response()->json(["mensaje" => "Los detalles de Instalaciones y Suministros se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_economicos') {
                Extra::where('inmueble_id',$request->inmueble_id)
                    ->update([
                        'gastos_comunidad'    => $request->gastos_comunidad,
                        'calidad_precio'      => $request->calidad_precio,
                        'rentabilidad'        => $request->rentabilidad,
                        'obs_datoseconomicos' => $request->obs_datoseconomicos,
                        'dateco_ok'           => 1
                        ]);
                return response()->json(["mensaje" => "Los detalles de Datos Económicos se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_finca') {
                Extra::where('inmueble_id',$request->inmueble_id)
                    ->update([
                        'construccion'        => $request->construccion,
                        'estilo_construccion' => $request->estilo_construccion,
                        'estructura'          => $request->estructura,
                        'portalyescalera'     => $request->portalyescalera,
                        'puerta_entrada'      => $request->puerta_entrada,
                        'numfachadas'         => $request->numfachadas,
                        'obs_finca'           => $request->obs_finca,
                        'finca_ok'            => 1
                        ]);
                return response()->json(["mensaje" => "Los detalles de Finca se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_situacion') {
                Extra::where('inmueble_id',$request->inmueble_id)
                    ->update([
                        'calif_urbana'            => $request->calif_urbana,
                        'cercania_a'              => $request->cercania_a,
                        'elementos_comunitarios'  => $request->elementos_comunitarios,
                        'entorno'                 => $request->entorno,
                        'equipamientos_zonas'     => $request->equipamientos_zonas,
                        'grado_urbanizacion'      => $request->grado_urbanizacion,
                        'sol'                     => $request->sol,
                        'transportes_publicos'    => $request->transportes_publicos,
                        'vistas'                  => $request->vistas,
                        'distancia_poblacion'     => $request->distancia_poblacion,
                        'obs_situacion'           => $request->obs_situacion,
                        'siten_ok'                => 1
                        ]);
                return response()->json(["mensaje" => "Los detalles de Situación y Entorno se guardaron correctamente."]);
            };

            if ($request->form_seccion == 'form_dropzone') {
                $file = $request->file('file');
                if (isset($file))
                    {
                        $destinationPath = 'files/';
                        $in_extension = $file->getClientOriginalExtension();
                        $filename = "inmueble_".time().rand(1,100).".".$in_extension;
                        $file->move($destinationPath, $filename);
                        $inmueble->image = $filename;
                    };
            };

            if ($request->form_url == 'form_url') {
                Extra::where('inmueble_id',$request->inmueble_id)
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
    public function destroy($id, Request $request)
    {
        $extras = Extra::where('inmueble_id','=',$id)->delete();
        return "Eliminado";
    }
}
