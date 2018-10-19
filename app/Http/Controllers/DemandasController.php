<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tipo; 
use App\Categoria; 
use App\Pais;
use App\Provincia;
use App\Via;
use App\Cliente;
use App\Inmueble;
use App\Demanda;
use App\ExtrasDemanda; 

class DemandasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            $demandas = Demanda::all();

            $demandas->each(function($demandas){
                $demandas->cliente;
                $demandas->inmueble;
            });

            $precios = [];
            $superficies = [];
            $habitaciones = [];
            $numinmuebles = [];
            $zonas = [];
            foreach ($demandas as $demanda) {
                $cadena_precio = '';
                $cadena_superficie = '';
                $hab = '-';
                $ninm = 0;
                $elementozona = '';
                /* DEMANDA EN BASE A UN INMUEBLE */
                if ($demanda->inmueble_id > 0) {
                    $parametrosDemanda  = Demanda::demandaBaseInmueble($demanda);
                    $cadena_precio      = $parametrosDemanda[0];
                    $cadena_superficie  = $parametrosDemanda[1];
                    $hab                = $parametrosDemanda[2];
                    $ninm               = $parametrosDemanda[3];
                    $zona               = $parametrosDemanda[4];
                }else{    /* DEMANDA EN BASE A DESCRIPCION */
                    // Precio
                    if ($demanda->moneda == 'EUR - Euro') {
                        $moneda = 'EUR';
                    }else{
                        $moneda = 'USD';
                    }
                    if ($demanda->ventaprecio_desde > 0 || $demanda->ventaprecio_hasta > 0) {
                        if ($demanda->ventaprecio_desde <= $demanda->ventaprecio_hasta ) {
                            $cadena_precio = 'Desde '.$demanda->ventaprecio_desde.' '.$moneda.' a'.$demanda->ventaprecio_hasta.' '.$moneda.'/Venta';
                        }
                    }
                    if ($demanda->alqres_precio_desde > 0 || $demanda->alqres_precio_hasta > 0) {
                        if ($demanda->alqres_precio_desde <= $demanda->alqres_precio_hasta ) {
                            if (strlen($cadena_precio) > 0) {
                                $cadena_precio = $cadena_precio.', Desde '.$demanda->alqres_precio_desde.' '.$moneda.' a'.$demanda->alqres_precio_hasta.' '.$moneda.'/Mes';
                            }else{
                                $cadena_precio = 'Desde '.$demanda->alqres_precio_desde.' '.$moneda.' a'.$demanda->alqres_precio_hasta.' '.$moneda.'/Mes';
                            }
                        }
                    }
                    // Superficie
                    if ($demanda->sup_desde > 0) {
                        $cadena_superficie = 'Desde '.$demanda->sup_desde.' m<sup>2</sup>';
                    }
                    if ($demanda->sup_hasta > 0) {
                        $cadena_superficie = $cadena_superficie.' hasta '.$demanda->sup_hasta.' m<sup>2</sup>';
                    }
                    // Habitaciones
                    $hab = $demanda->habitaciones;
                    // Inmuebles
                    $ninm = $this->inmueblesCoincidentes($demanda->id,true); // al pasar true como parametro la funcion inmueblesCoincidentes me devuelve solo el numero de inmuebles
                    // Zona
                    $zona = $demanda->zona;
                }
                $precios[$demanda->id] = $cadena_precio;
                $superficies[$demanda->id] = $cadena_superficie;
                $habitaciones[$demanda->id] = $hab;
                $numinmuebles[$demanda->id] = $ninm;
                $zonas[$demanda->id] = $zona;
            }
            $tipos = Tipo::all();
            return view('demandas.index', compact('demandas', 'tipos', 'precios','superficies','habitaciones','numinmuebles','zonas'));
        }else{
            return $this->show($id);
        }
    }

    public function mostrarInmueblesCoincidentes($iddemanda){
        $inmuebles = $this->inmueblesCoincidentes($iddemanda,false,1);
        return view('demandas.inms_de_demanda', compact('inmuebles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincia::all();
        $clientes = Cliente::all();
        $inmuebles = Inmueble::all();
        $inmuebles->each(function($inmuebles){
            $inmuebles->tipo;
            $inmuebles->modalidad;
            $inmuebles->municipio;
        });
        $inmu= [];
        $tmp_operacion = '';
        foreach ($inmuebles as $i) {
            if ($i->modalidad->venta == 1) {
                $tmp_operacion .= '(Venta)';
            }
            if (($i->modalidad->alquiler_residencial == 1) || ($i->modalidad->alquiler_vacacional == 1)) {
                $tmp_operacion .= '(Alquiler)';
            }
            if ($i->modalidad->traspaso == 1) {
                $tmp_operacion .= '(Traspaso)';
            }
            if ($i->modalidad->opcion_compra == 1) {
                $tmp_operacion .= '(Opción Compra)';
            }
            if ($i->modalidad->compartir == 1) {
                $tmp_operacion .= '(Compartir)';
            }
            $inmu[] = [$i, $tmp_operacion];
        }
        return view('demandas.create', compact('tipos','categorias','paises','provincias','vias','clientes','inmu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->tipo_demanda == 'inmueble') {
            $messages = [
                    'cliente_id.required' => 'Debe seleccionar un cliente.',
                    'inmueble.required' => 'Debe seleccionar un inmueble.',
                    'comunicacion.required' => 'Debe definir la forma en la que nos comunicaremos con usted.'
                ];

            $this->validate($request,[
                    'cliente_id'     => 'required',
                    'inmueble'       => 'required',
                    'comunicacion'   => 'required'
                    ],$messages);

            $demanda = new Demanda();
            $demanda->cliente_id = $request->cliente_id;
            $demanda->inmueble_id = $request->inmueble;
            $demanda->origen_demanda = $request->origen_demanda;
            $demanda->comunicacion = $request->comunicacion;
            $demanda->tipo_demanda = $request->tipo_demanda;
        }elseif  ($request->tipo_demanda == 'describir_demanda'){
            //dd($request);
            $messages = ['tipo_inmueble_id.required' => 'Debe seleccionar el tipo de inmueble.'];
            $this->validate($request,['tipo_inmueble_id'  => 'required'],$messages);
            $demanda = new Demanda(); 
            $demanda->cliente_id = $request->cliente_id;
            $demanda->inmueble_id = 0;
            $demanda->tipo_inmueble_id = $request->tipo_inmueble_id;
            $demanda->categoria_id = $request->categoria_id;
            $demanda->obranueva = $request->obranueva;
            $demanda->adjudicacion = $request->adjudicacion;
            $demanda->sup_desde = $request->sup_desde;
            $demanda->sup_hasta = $request->sup_hasta;
            $demanda->venta = $request->venta;
            $demanda->ventaprecio_desde = $request->ventaprecio_desde;
            $demanda->ventaprecio_hasta = $request->ventaprecio_hasta;
            $demanda->ventaprecio_desde_m2 = $request->ventaprecio_desde_m2;
            $demanda->ventaprecio_hasta_m2 = $request->ventaprecio_hasta_m2;
            $demanda->alquiler_residencial = $request->alquiler_residencial;
            $demanda->alqres_precio_desde = $request->alqres_precio_desde;
            $demanda->alqres_precio_hasta = $request->alqres_precio_hasta;
            $demanda->alqres_preciom2_desde = $request->alqres_preciom2_desde;
            $demanda->alqres_preciom2_hasta = $request->alqres_preciom2_hasta;
            $demanda->opcioncompra = $request->opcioncompra;
            $demanda->moneda = $request->moneda;
            $demanda->banos = $request->banos;
            $demanda->habitaciones = $request->habitaciones;
            
            // Busqueda Basica
            if ($request->opcion_busqueda == 'basica') {
                $demanda->pais_id = $request->pais;
                $demanda->provincia_id = $request->provincia;
                $demanda->zona = $request->zona;
            }
            // Busqueda por un radio definido
            if ($request->opcion_busqueda == 'radio') {
                if ($request->via_ra != '') {
                    $demanda->via_id = $request->via_ra;
                }
                if ($request->calle_ra != '') {
                    $demanda->calle = $request->calle_ra;
                }
                if ($request->numero_ra != '') {
                    $demanda->numero = $request->numero_ra;
                }
                if ($request->radio != '') {
                    $demanda->radio = $request->radio;
                }
            }
            // Busqueda dibujando sobre mapa
            if ($request->opcion_busqueda == 'mapa') {
                if ($request->via_bm != '') {
                    $demanda->via_id = $request->via_bm;
                }
                if ($request->calle_bm != '') {
                    $demanda->calle = $request->calle_bm;
                }
                if ($request->numero_bm != '') {
                    $demanda->numero = $request->numero_bm;
                }
                if ($request->radio != '') {
                    $demanda->radio = $request->radio;
                }
            }
            $demanda->opcion_busqueda = $request->opcion_busqueda;
            $demanda->notas = $request->notas;

            $demanda->tipo_demanda = $request->tipo_demanda;
        }
        if ($demanda->save()) {
            $ultdem = Demanda::orderBy('id','DES')->first();
            $extrasdemanda = new ExtrasDemanda();
            $extrasdemanda->demanda_id = $ultdem->id;
            $extrasdemanda->save();
            //return redirect()->route('demandas.index');
            return response()->json(["mensaje" => "La demanda se guardo correctamente", 'demandaid' => $ultdem->id, 'demanda' => $ultdem]);
        }else{
            return json_encode(["mensaje" => "Ha ocurrido un error al intentar guardar la demanda."]);
        }

       
    }

    public function inmueblesCoincidentes($iddemanda, $solo_contar = false, $tipoResultado = 0){
        /* Este metodo se ejecuta cuando se crea una demanda, el proceso es determinar primedo si esa demanda
        es en base a un inmueble o una descripcion. */
        
        $demanda = Demanda::find($iddemanda);
        $conddem = $demanda->extrademanda; // Datos Extras de la demanda

        /* Si la demanda es en base a un inmueble (inmueble_id > 0 en la tabla de demandas),  
        entonces buscamos la informacion de ese inmueble, asi como el tipo de modalidad del mismo.
        En caso contrario (inmueble_id = 0 en la tabla de demandas), leemos todos los inmuebles existentes
        y comparamos sus datos con los de la demanda que estamos procesando, si hay coincidencias en algunos de ellos
        segun ciertos criterios entonces contamos esos inmuebles como coincidentes.
        */
        if ($demanda->inmueble_id > 0) { // Esto es si al crearse la demanda se hizo en base a un inmueble
            $inmueble = Inmueble::find($demanda->inmueble_id);
            $coincide = 1;
                // Se determina la modalidad del inmueble (Venta/Alquiler/Opcion a compra/Traspaso)
                $string_temp = '';
                $contador_alquiler = 0;
                if ($inmueble->modalidad->venta == 1) {   
                   $string_temp .= "Venta";
                }
                if ($inmueble->modalidad->alquiler_residencial == 1) { $contador_alquiler++; }
                if ($inmueble->modalidad->alquiler_vacacional == 1) { $contador_alquiler++; }
                if ($inmueble->modalidad->alqvac_dia == 1) { $contador_alquiler++; }
                if ($inmueble->modalidad->alqvac_semana == 1) { $contador_alquiler++; }
                if ($inmueble->modalidad->alqvac_quincena == 1) { $contador_alquiler++; }
                if ($inmueble->modalidad->alqvac_mes == 1) { $contador_alquiler++; }
                if ($inmueble->modalidad->alqvac_temporada == 1) { $contador_alquiler++; }
                if ($inmueble->modalidad->alqvac_anno == 1) { $contador_alquiler++; }
                if ($contador_alquiler > 0) { 
                    $string_temp = $this->coma($string_temp);     
                    $string_temp .= "Alquiler";
                }
                if ($inmueble->modalidad->opcion_compra == 1) { 
                    $string_temp = coma($string_temp);     
                    $string_temp .= "Opcion a compra";
                }
                if ($inmueble->modalidad->traspaso == 1) {
                    $string_temp = coma($string_temp);
                    $string_temp .= "Traspaso";
                }
            // Se devuelve el inmueble a partir del cual se creo la demanda
            if ($tipoResultado == 1) {
                $datos = ['inmuebles' => $inmueble, 'coincidente' => $coincide, 'operacion' => $string_temp];
                return [$datos];
                //return json_encode(['inmueble' => $inmueble, 'coincidente' => $coincide, 'operacion' => $string_temp]);
            }

            return View('demandas.sections.resultado_coincidentes')->with('inmueble', $inmueble)->with('coincidente', $coincide)->with('operacion',$string_temp);
        } else{ // Esto es si al crearse la demanda se hizo en base a la descripcion
            $inmuebles = Inmueble::all();
            $inmuebles->each(function($inmuebles){
                $inmuebles->tipo;
                $inmuebles->municipio;
                $inmuebles->pais;
                $inmuebles->extra;
                $inmuebles->modalidad;
            });
            $lista_inmuebles = [];
            $contador = 0;

            foreach ($inmuebles as $inmueble) {
                $condinm = $inmueble->extra;
                $coincide = 1;
                $contador ++;
                $coincide = $this->coincidencia($demanda->tipo_inmueble_id, $inmueble->tipo_id, $coincide);
                $coincide = $this->rango($demanda->sup_desde, $demanda->sup_hasta, $inmueble->superficie,$coincide);
                $coincide = $this->coincidencia($demanda->banos, $inmueble->banos, $coincide);
                $coincide = $this->coincidencia($demanda->habitaciones, $inmueble->habitaciones, $coincide);
                $coincide = $this->coincidencia($demanda->pais_id, $inmueble->pais_id, $coincide);
                /* Si se marca la opcion de venta, se comprueba si se ingreso algun rango de valores, 
                tanto para el precio en venta, como el precio en venta por metro cuadrado */
                if ($inmueble->modalidad->venta == 1) {
                    if ($demanda->ventaprecio_desde > 0 || $demanda->ventaprecio_hasta >0) {
                        $coincide = $this->rango($demanda->ventaprecio_desde, $demanda->ventaprecio_hasta, $inmueble->modalidad->ventaprecio,$coincide);
                    }
                    if ($demanda->ventaprecio_desde_m2 > 0  || $demanda->ventaprecio_hasta_m2 > 0 ) {
                        $coincide = $this->rango($demanda->ventaprecio_desde_m2, $demanda->ventaprecio_hasta_m2, $inmueble->modalidad->ventaprecio2,$coincide);
                    }
                }
                /* Si se marca la opcion de alquiler residencial, se comprueba si se ingreso algun rango de valores, 
                tanto para el precio del alquiler, como el precio del alquiler por metro cuadrado */
                if ($inmueble->modalidad->alquiler_residencial == 1) {
                    if ($demanda->alqres_precio_desde > 0 || $demanda->alqres_precio_hasta >0) {
                        $coincide = $this->rango($demanda->alqres_precio_desde, $demanda->alqres_precio_hasta, $inmueble->modalidad->alqresprecio,$coincide);
                    }
                    if ($demanda->alqres_preciom2_desde > 0  || $demanda->alqres_preciom2_hasta > 0 ) {
                        $coincide = $this->rango($demanda->alqres_preciom2_desde, $demanda->alqres_preciom2_hasta, $inmueble->modalidad->alqresprecio2,$coincide);
                    }
                }
           
               
                /* Si el inmueble actual tiene coincidencias con la demanda se determina si cumple con la 
                modalidad de venta o alquiler de la demanda */
                $string_temp = ''; // En esta cadena almacenaremos la modalidad en forma de texto
                
                if ($coincide == 1) {
                    $coincide = 0; // Lo forzamos a 0, en caso de que haya coincidencia en la venta o alquiler lo volvemos a llevar a 1
                    
                    // Coincidencia en la Venta
                    if ($demanda->venta == 1 && $inmueble->modalidad->venta == 1)  {
                        $coincide = 1; // Si el inmueble esta en venta y la demanda es de comprar entonces existe coincidencia
                        $string_temp .= "Venta";
                    }
                    // Coincidencia en el Alquiler
                    if ($demanda->alquiler_residencial == 1  && $inmueble->modalidad->alquiler_residencial ==1)  
                    {
                        $coincide = 1; // Si el inmueble esta en alquiler y la demanda es de alquiler entonces existe coincidencia
                        $string_temp = $this->coma($string_temp);
                        $string_temp .= "Alquiler";
                        //$contador_alquiler = 0;
                        /*if ($inmueble->modalidad->alquiler_residencial == 1) { $contador_alquiler++; }
                        if ($inmueble->modalidad->alquiler_vacacional == 1) { $contador_alquiler++; }
                        if ($inmueble->modalidad->alqvac_dia == 1) { $contador_alquiler++; }
                        if ($inmueble->modalidad->alqvac_semana == 1) { $contador_alquiler++; }
                        if ($inmueble->modalidad->alqvac_quincena == 1) { $contador_alquiler++; }
                        if ($inmueble->modalidad->alqvac_mes == 1) { $contador_alquiler++; }
                        if ($inmueble->modalidad->alqvac_temporada == 1) { $contador_alquiler++; }
                        if ($inmueble->modalidad->alqvac_anno == 1) { $contador_alquiler++; }*/
                        /*if ($contador_alquiler > 0) { 
                            $string_temp = $this->coma($string_temp);     
                            $string_temp .= "Alquiler";
                        }*/
                        /*if ($inmueble->modalidad->opcion_compra == 1) { 
                            $string_temp = coma($string_temp);     
                            $string_temp .= "Opcion a compra";
                        }
                        if ($inmueble->modalidad->traspaso == 1) {
                            $string_temp = coma($string_temp);
                            $string_temp .= "Traspaso";
                        }*/
                    }
                    // Opcion Compra
                    if ( $inmueble->modalidad->opcion_compra == 1 && $demanda->opcioncompra == "Si" ) 
                    { 
                            $coincide = 1;
                            $string_temp = $this->coma($string_temp);     
                            $string_temp .= "Opcion a compra";
                    }
                    /* Finalmente si $coincide ==  1 hemos tenido coincidencia de la demanda
                    con el inmueble actual del ciclo */
                    if ($coincide == 1) {
                        $lista_inmuebles[] = $inmueble;
                        $datos[] = ['inmuebles' => $inmueble, 'coincidente' => $coincide, 'operacion' => $string_temp];
                    }
                }
            }
            if (count($lista_inmuebles) > 0) { 
                // Se devuelve la lista de los inmuebles que coincidieron con la demanda
                if ($solo_contar == false) {
                    if ($tipoResultado == 1) {
                        return $datos;
                        //return json_encode(['inmuebles' => $lista_inmuebles, 'coincidente' => $coincide, 'operacion' => $string_temp]);
                    };
                    return View('demandas.sections.resultado_coincidentes')->with('inmuebles', $lista_inmuebles)
                                                                           ->with('coincidente', $coincide)
                                                                           ->with('operacion',$string_temp);
                }else{
                    return count($lista_inmuebles);
                }
                 
            }else {
                if ($solo_contar == false) {
                    return [];
                }else{
                    return 0;
                }
            }
        }
        return [];
    }

    public function coma($cadena){
        if ((strlen($cadena)>0)) { return $cadena .= ', '; }
        else { return ''; }
    }

    /* Funcion que devuelve 1 si existe coincidencia entre una caracteristica de un inmueble con
       la caracteristica correspondiente de una demanda determinada, se devuelve 0 en caso contrario.
       En caso de que en la demanda se especifique la caracteristica como Indiferente tambien se devolvera 1    
    */
    private function coincidencia($demanda, $existente,$coincide){
        if((($demanda == $existente) || ($demanda == 'Indiferente') || ($demanda == 0)) && $coincide == 1){
            return 1;
        } else {
            return 0;
        }
    }

    /* Funcion que devuelve 1 si una caracteristica de un inmueble se encuentra en el rango de una demanda 
    determinada, y 0 en caso contrario */
    private function rango($min, $max, $existente,$coincide){
        if(( (($existente >= $min) && ($existente <= $max)) || ($min == 0 && $max == 0) ) && $coincide == 1){
            return 1;
        } else {
            return 0;
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
        $demanda = Demanda::find($id);
        $tipos = Tipo::all();
        $categorias = Categoria::all();
        $paises = Pais::all();
        $provincias = Provincia::all();
        $vias = Via::all(); 
        $clientes = Cliente::all();
        $inmuebles = Inmueble::all();
        $inmuebles->each(function($inmuebles){
            $inmuebles->tipo;
            $inmuebles->modalidad;
            $inmuebles->municipio;
        });
        $inmu= [];
        $tmp_operacion = '';
        foreach ($inmuebles as $i) {
            if ($i->modalidad->venta == 1) {
                $tmp_operacion .= '(Venta)';
            }
            if (($i->modalidad->alquiler_residencial == 1) || ($i->modalidad->alquiler_vacacional == 1)) {
                $tmp_operacion .= '(Alquiler)';
            }
            if ($i->modalidad->traspaso == 1) {
                $tmp_operacion .= '(Traspaso)';
            }
            if ($i->modalidad->opcion_compra == 1) {
                $tmp_operacion .= '(Opción Compra)';
            }
            if ($i->modalidad->compartir == 1) {
                $tmp_operacion .= '(Compartir)';
            }
            $inmu[] = [$i, $tmp_operacion];
        }

        return view('demandas.edit', compact('tipos','categorias','paises','provincias','vias','clientes','inmu', 'demanda'));
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
    public function destroy($id, Request $request)
    {
        $demanda = Demanda::find($id);
        $demanda->delete();

        $message = 'Se ha eliminado el registro de la demanda';
        if ($request->ajax()) {
            return $message;
        };
    }
}
