<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pais;
use App\Idioma;
use App\Municipio;
use App\Promocion;
use App\Via;
use Auth;
use App\User;
use App\Categoria;
use App\Tipo;
use App\Agencia;

class PromocionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            $promociones = Promocion::where('user_id',Auth::user()->id)->get();
            $promociones->each(function($promociones){
                    $promociones->imagenes;
                    $promociones->pais;
                    $promociones->municipio;
                    $promociones->via;
            });

            return view('promociones.index', compact('promociones'));
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
        $paises = Pais::all();
        $idiomas = Idioma::all();
        //$municipios = Municipio::where('provincia_id',1)->get();
        $municipios = Municipio::all();
        $vias = Via::all();
        $usuario = Auth::user();
        $agencias = $usuario->agencias;
        
        $promoima = '';
        $promofile = '';
         
        $categorias = Categoria::all();
        $tipos = Tipo::all();
        $pisoid = 1;
        // Agencia y Promciones
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();
        if (count($agencia)>0) {
            $promociones = Promocion::where('agencia_id',$agencia[0]->id)->get();
        }else{
            $promociones = [];
        };
        $tipologias = [];
        $pisos = ['Sótano', 'Subsótano', 'Bajos', 'Entresuelo','Principal','1ro','2do','3ro','4to','5to'];
        $monedas = ['EUR - Euro', 'USD - Dólar estadounidense'];

        if (count($agencias)>0) {
            $agentes = $agencias[0]->agentes;
            return view('promociones.create',compact('paises','idiomas','municipios','vias','tipos','categorias','pisos','pisoid', 'monedas','tipologias','agencias','agentes','promoima','promofile'));
        }else{
            $agentes = [];
            return view('promociones.create',compact('paises','idiomas','municipios','vias','tipos','categorias','pisos','pisoid', 'monedas','tipologias','agencias','agentes','promoima','promofile'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*  Los datos de la promocion se guardan en 3 partes (un acordion de 3 secciones en la vista)
            Aqui verificamos el valor del campo wich_form (que es un campo hidden que se esta enviando) 
            para ver cual de los 3 formularios se esta enviando, si es 0 se trata del primer 
            formulario que crea la promocion.
        */
        if ($request->ajax()) {
            if ($request->numform == 0) {
                 $messages = [
                    'nombre.required' => 'Debe ingresar un nombre para la promoción.',
                    'tipo_promocion.required' =>'Debe ingresar el tipo de promoción.',
                    'comercializa.required' => 'Debe ingresar la persona o entidad que comercializa.',
                    'promotor.required' => 'Debe ingresar el promotor.',
                    'tipoVPO.required' => 'El tipoVPO es requerido.',
                    'fecha_entrega.required' => 'La fecha de entrega es obligatoria.',
                    'codigo_postal.required' => 'El código postal es obligatorio.',
                    'estado.required' => 'El estado es obligatorio.',
                    'municipio_id.required' => 'El municipio es obligatorio.',
                    'via_id.required'       => 'El tipo de vía es obligatorio.',
                    'calle.required'         => 'El nombre o número de calle es obligatorio.',
                    'numero.required'        => 'El número de la dirección es obligatorio',
                    'idioma_id.required'   => 'Debe elegir el idioma de la descripción.',
                    'descripcion_corta.required'         => 'Debe ingresar al menos una descripción corta del inmueble',
                    'persona.required'  => 'Debe ingresar el nombre de la persona de contacto.',
                    'anio_contruccion.numeric'  => 'El año de construccion debe ser numérico.',
                    'anio_contruccion.between'  => 'El año de construccion se encuentra fuera de rango.'
                ];
                $this->validate($request,[
                    'nombre'            => 'required|max:120',
                    'tipo_promocion'    => 'required',
                    'anio_contruccion'  => 'numeric',
                    'comercializa'      => 'required',
                    'tipoVPO'           => 'required',
                    'fecha_entrega'     => 'required',
                    'estado'            => 'required',
                    'pais_id'           => 'required',
                    'codigo_postal'     => 'required',
                    'municipio_id'      => 'required',
                    'via_id'            => 'required',
                    'calle'             => 'required',
                    'numero'            => 'required',
                    'idioma_id'         => 'required|numeric',
                    'descripcion_corta' => 'required',
                    'persona'           => 'required'
                ],$messages);
                $promocion = new Promocion();
                $promocion->user_id = Auth::user()->id; // Clave foranea del usuario que crea la promocion
                $agencia = Agencia::where('user_id',Auth::user()->id)->get();

                $promocion->agencia_id = $agencia[0]->id;

                $promocion->nombre = $request->nombre;
                $promocion->tipo_promocion = $request->tipo_promocion;
                $promocion->constr = $request->constr;
                $promocion->promotor = $request->promotor;
                $promocion->comercializa = $request->comercializa;
                $promocion->tipoVPO = $request->tipoVPO;
                $promocion->fecha_entrega = $request->fecha_entrega;
                $promocion->anio_contruccion = $request->anio_contruccion;
                $promocion->cert_energ = $request->cert_energ;
                $promocion->fecha_alta = $request->fecha_alta;
                $promocion->estado = $request->estado;
                $promocion->pais_id = $request->pais_id;
                $promocion->codigo_postal = $request->codigo_postal;
                $promocion->municipio_id = $request->municipio_id;
                $promocion->via_id = $request->via_id;
                $promocion->calle = $request->calle;
                $promocion->numero = $request->numero;
                $promocion->piso = $request->piso;
                $promocion->escalera = $request->escalera;
                $promocion->puerta = $request->puerta;
                $promocion->mostrardireccion = $request->mostrardireccion;
                $promocion->zona = $request->zona;

                //Extras de la promocion
                $promocion->ascensor_prin = $request->ascensor_prin;
                $promocion->ascensor_serv = $request->ascensor_serv;
                $promocion->domotica = $request->domotica;
                $promocion->parking_comu = $request->parking_comu;
                $promocion->parking_priv = $request->parking_priv;
                $promocion->piscina_priv = $request->piscina_priv;
                $promocion->trastero = $request->trastero;
                $promocion->zona_depor = $request->zona_depor;
                $promocion->zona_comu = $request->zona_comu;
                $promocion->zona_infa = $request->zona_infa;
                $promocion->energia_solar = $request->energia_solar;
                $promocion->serv_porteria = $request->serv_porteria;
                $promocion->alarma = $request->alarma;
                $promocion->montacargas = $request->montacargas;

                $promocion->obs_extras = $request->obs_extras;
                
                //Extras de la promocion
                $promocion->park_publico = $request->park_publico;
                $promocion->suelo = $request->suelo;
                $promocion->ascensor = $request->ascensor;
                $promocion->ofloc_parking_privado = $request->ofloc_parking_privado;
                $promocion->ofloc_servicio_porteria = $request->ofloc_servicio_porteria;
                $promocion->ofloc_trastero = $request->ofloc_trastero;
                $promocion->ind_ascensor = $request->ind_ascensor;
                $promocion->muelles = $request->muelles;
                $promocion->ind_parking_publico = $request->ind_parking_publico;
                $promocion->ind_parking_privado = $request->ind_parking_privado;
                $promocion->ind_montacargas = $request->ind_montacargas;
                $promocion->ind_trastero = $request->ind_trastero;
                $promocion->obs_extras = $request->obs_extras;

                // DESCRIPCION
                $promocion->idioma_id = $request->idioma_id;
                $promocion->descripcion_corta = $request->descripcion_corta;
                $promocion->descripcion_extendida = $request->descripcion_extendida;
                $promocion->slogan = $request->slogan;
                $promocion->slogan_financiero = $request->slogan_financiero;
                $promocion->condiciones_economicas = $request->condiciones_economicas;
                $promocion->memoria = $request->memoria;

                $promocion->idioma_id2 = $request->idioma_id2;
                $promocion->descripcion_corta2 = $request->descripcion_corta2;
                $promocion->descripcion_extendida2 = $request->descripcion_extendida2;
                $promocion->slogan2 = $request->slogan2;
                $promocion->slogan_financiero2 = $request->slogan_financiero2;
                $promocion->condiciones_economicas2 = $request->condiciones_economicas2;
                $promocion->memoria2 = $request->memoria2;
                
                        
                $promocion->persona = $request->persona;
                $promocion->mostrar_contacto = $request->mostrar_contacto;
                $promocion->email_contacto = $request->email_contacto;
                $promocion->telefono_contacto = $request->telefono_contacto;

                if ($promocion->save()) {
                    /* Necesitamos el id de la promocion que acabamos de guardar para 
                       pasarsela al siguiente formulario. Lo almacenaremos en la 
                       variable $idu */
                    $idu = Promocion::orderBy('id','ASC')->get()->last();
                    $idu = $idu->id;
                    $data = array(
                        "mensaje" => "Los \"Datos Principales\" se han guardado exitosamente.",
                        "idu" => $idu
                    );
                    echo json_encode($data);
                }else{
                    return response()->json(["mensaje" => "Ha ocurrido un error al intentar guardar los \"Datos Principales\"."]);
                };
                
            //}//elseif ($request->numform == 1) {
                /*$promocion = Promocion::find($request->$idu);
                $data = array(
                            "mensaje" => "Tercer formulario",
                            "idu" => $promocion->nombre
                        );
                echo json_encode($data);*/
                /*if ($promocion->save()) {
                    
                    return response()->json(["mensaje" => "Los \"Datos Internos\" se han guardado exitosamente.", "id" => $idu]);
                }else{
                    return response()->json(["mensaje" => "Ha ocurrido un error al intentar guardar los \"Datos Internos\" de la Promoción."]);
                };*/
            };
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
        if ($request->ajax()) {
            if ($request->numform == 1) {
               /* $data = array("mensaje" => "Valor de IDU", "idu" => $valoridu);
                echo json_encode($data);*/
                $promocion = Promocion::find($request->idu);
                $promocion->agencia = $request->agencia;
                $promocion->agente = $request->agente;
                $promocion->cliente_propietario = $request->cliente_propietario;
                $promocion->medio_captacion = $request->medio_captacion;
                $promocion->contrato = $request->contrato;
                $promocion->inicio_contrato = $request->inicio_contrato;
                $promocion->fin_contrato = $request->fin_contrato;
                $promocion->inm_exclusiva = $request->inm_exclusiva;
                $promocion->llaves = $request->llaves;
                $promocion->coment_llaves = $request->coment_llaves;
                $promocion->notas_internas = $request->notas_internas;
                if ($promocion->save()) {
                    $data = array("mensaje" => "Los \"Datos Internos\" se han guardado exitosamente.");
                    echo json_encode($data);
                }else{
                    return response()->json(["mensaje" => "Ha ocurrido un error al intentar guardar los \"Datos Internos\" de la Promoción."]);
                };
            }
        }
    }

    public function refresh($promocion_id){
            $promocion = Promocion::find($promocion_id);
            //$promocion_actual = $promocion->imagenes;
            $promoima = $promocion->imagenes;
            //return response()->json(['promocion' => $promocion, 'id_promo' => $promocion_id]);
            return View('promociones.sections.tabla_ima')->with('promoima', $promoima);
    }

    public function refreshfiles($promocion_id){
            $promocion_actual = Promocion::find($promocion_id);
            $promofile = $promocion_actual->archivos;
            return View('promociones.sections.tabla_file')->with('promofile', $promofile);
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
