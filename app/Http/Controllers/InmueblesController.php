<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Categoria;
use App\Entidad;
use App\Inmueble;
use App\Interior;
use App\Exterior;
use App\Finca;
use App\Imagen;
use App\Modalidad;
use App\Extra;
use App\Agencia;
use App\Agente;
use App\Cliente;
use App\Promocion;
use App\Demanda;
use App\Tipo;
use DB;
use Postcode;
use App\Provincia;
use App\Ciudad;
use Illuminate\Support\Facades\Log;

class InmueblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {   
        if ($id == null) {
            /* Getting the properties list */
            /*$inmuebles =  Inmueble::select('id','tipo_id','estado','superficie',
                                           'ciudad_id','calle', 'numero','id_portada','pais_id',
                                           'habitaciones','banos','agencia_id')
                                    ->where('usuario_id','=',Auth::user()->id)
                                    ->where('active',1)
                                    ->orderBy('id','DES')
                                    ->get();*/

            $inmuebles = Inmueble::getProperties();
            
            /* Getting the property data through the relational model */
            $inmuebles->each(function($inmuebles){
                $inmuebles->imagenes;
                $inmuebles->pais;
                $inmuebles->getAgenceId();
            });

            /* Getting the number of Demands by Property */
            $demCoincidentes = [];
            foreach ($inmuebles as $inmueble) {
                $demCoincidentes[$inmueble->id] = $inmueble->getDemands();
            };
            return view('inmuebles.index', compact('inmuebles','demCoincidentes'));
        }else{
            return $this->show($id);
        };  
    }

    public function buscarcp(){

        $map =  Mapper::map(53.381128999999990000, -1.470085000000040000);

        return view('inmuebles.buscar');
    }

    public function encuentra(Request $request){
        if ($request->ajax()) {
            $postcode = Postcode::lookup($request->codigo_postal);
            $latitude = $postcode['latitude'];
            $longitude = $postcode['longitude'];
            $map = Mapper::map($latitude, $longitude);
            //Mapper::map($postcode->latitude, $postcode->longitude, ['zoom' => 15, 'center' => true, 'marker' => false, 'type' => 'ROAD', 'overlay' => 'TRAFFIC']);
            return json_encode(['respuesta' => 'OK', 'map' => $map]);
        }
    }

    /* Devuelve las Demandas coincidentes para un inmueble dado */
    public function demandasCoincidentes($id_inmueble, $mostrar = false){
        /*if ($mostrar == true) {
            $tipos = Tipo::all();
            
            return view('inmuebles.demandas_coincidentes.demandas_por_inmueble', compact('lista_demandas','tipos','zonas','precios','superficies','habitaciones'));
        }else{
            return count($lista_demandas);
        }*/
    }

    public function lista(){
        $ar2 = ['aaData'=>$arr];
        $respuesta = json_encode($ar2);
        return $respuesta;
    }

    /**
     * Show the form for creating a new Property (Inmueble).
     * Used from the Proffesional Control Panel
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        // Lectura de variables para pasar a la vista de crear inmuebles
        $entidades = Entidad::all();

        // Agencia y Promociones
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();
        $promociones = [];
        $agentes = [];
        if (count($agencia)>0) {
            $promociones = Promocion::where('agencia_id',$agencia[0]->id)->get();
            $agentes = Agente::where('agencia_id',$agencia[0]->id)->get();
        }

        $clientes = Cliente::where('usuario_id',Auth::user()->id)->get();
        $tipologias = [];
        $monedas = ['EUR - Euro', 'USD - Dólar estadounidense'];
        $inmueble_id = 0;
        $inmuima = [];
        $inmufile = [];
        $demandas = [];
        return view('inmuebles.create', compact('inmueble_id','entidades', 'monedas','promociones','tipologias','inmuima','inmufile', 'agencia', 'agentes','clientes','demandas'));
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

            $messages = [
                'tipo_id.required' =>'Debe ingresar el tipo de inmueble.',
                'categoria_id.required' => 'Debe ingresar la categoría.',
                'fecha_alta.required' => 'Debe ingresar la fecha de alta.',
                'estado.required' => 'Debe ingresar el estado del inmueble.',
                'pais_id.required' => 'Debe ingresar el país.',
                'codigo_postal.required' => 'El código postal es obligatorio.',
                'provincia_id.required' => 'La provincia es obligatoria.',
                'ciudad_id.required' => 'La ciudad es obligatoria.',
                'via_id.required'       => 'El tipo de vía es obligatorio.',
                'calle.required'         => 'El nombre o número de calle es obligatorio.',
                'numero.required'        => 'El número de la dirección es obligatorio',
                'ventaprecio.numeric'   => 'Los campos de precio deben ser numéricos.',
                'ventaprecio2.numeric'  => 'Los campos de precio deben ser numéricos.',
                'traspasoprecio.numeric'    => 'Los campos de precio deben ser numéricos.',
                'traspasoprecio.numeric'    => 'Los campos de precio deben ser numéricos.',
                'superficie.required'       => 'Debe ingresar la superficie en metros cuadrados del inmueble.',
                'anio_contruccion.required'=> 'Debe ingresar el año de construcción del inmueble.',
                'anio_contruccion.numeric'=> 'El año de construcción del inmueble debe ser numérico.',
                'descripcion_corta.required'         => 'Debe ingresar al menos una descripción corta del inmueble',
                'persona.required'  => 'Debe ingresar el nombre de la persona de contacto.',
            ];

            $this->validate($request,[
                'tipo_id' 		=> 'required|numeric',
                'categoria_id'  => 'required|numeric',
                'fecha_alta'    => 'required',
                'estado'		=> 'required',
                'pais_id'		=> 'required',
                'codigo_postal'	=> 'required',
                'provincia_id'	=> 'required',
                'ciudad_id'  => 'required',
                'via_id'		=> 'required',
                'calle'			=> 'required',
                'numero'		=> 'required',
                'superficie'    => 'required',
                'ventaprecio'	=> 'numeric',
                'ventaprecio2'	=> 'numeric',
                'traspasoprecio'	=> 'numeric',
                'traspasoprecio'	=> 'numeric',
                'descripcion_corta' => 'required',
                'persona'       => 'required',
                'anio_contruccion'=> 'required|numeric'
            	],$messages);
            
            //$ultima_modalidad = Modalidad::orderBy('id')->get()->last();
            // Comprobamos si se guardó la modalidad
                $inmueble = new Inmueble(); 
                $inmueble->fill($request->all());
                $inmueble->usuario_id = Auth::user()->id;
                $inmueble->agencia_id = $inmueble->getAgenceId();
                $inmueble->id_portada = 'miniatura_inmueble.png';
                
                // Si no se intridujo el anio de construccion pero el inmuebles es basado en una promocion
                // entoces se toma el anio de la promocion como el de construccion del inmueble
                if ($request->anio_contruccion == null && $request->promocion_id !== null) {
                    $inmueble->anio_contruccion = $inmueble->getConstructionYear($request->obranueva, $request->promocion_id);
                }

                if ($inmueble->save()) {
                    $ultimo_inmueble = Inmueble::orderBy('id','DES')->first();
                    $id_inmueble = $ultimo_inmueble->id;

                    /* MODALIDAD DE VENTA, ALQUILER, TRASPASO, ETC */
                    $modalidad = new Modalidad();
                    $modalidad->fill($request->all());
                    $modalidad->inmueble_id = $inmueble->id;
                    Log::info('comienza');
                    Log::info($request->ventaprecio);
                    $modalidad->save();

                    /* INICIO DATOS INTERIORES */
                    $datos_int = new Interior();
                    $datos_int->inmueble_id = $id_inmueble;
                    $datos_int->aire_acondicionado = $request->aire_acondicionado;
                    $datos_int->amueblado = $request->amueblado;
                    $datos_int->armarios = $request->armarios;
                    $datos_int->calefaccion_int = $request->calefaccion_int;
                    $datos_int->cocina_equipada = $request->cocina_equipada;
                    $datos_int->cocina_office = $request->cocina_office;
                    $datos_int->domotica = $request->domotica;
                    $datos_int->electrodomesticos = $request->electrodomesticos;
                    $datos_int->gresceramica = $request->gresceramica;
                    $datos_int->horno = $request->horno;
                    $datos_int->internet = $request->internet;
                    $datos_int->wifi = $request->wifi;
                    $datos_int->lavadora = $request->lavadora;
                    $datos_int->microondas = $request->microondas;
                    $datos_int->nevera = $request->nevera;
                    $datos_int->no_amueblado = $request->no_amueblado;
                    $datos_int->parquet = $request->parquet;
                    $datos_int->puerta_blindada = $request->puerta_blindada;
                    $datos_int->mascotas = $request->mascotas;
                    $datos_int->suite_con_bano = $request->puerta_blindada;
                    $datos_int->lavadero = $request->lavadero;
                    $datos_int->television = $request->television;
                    $datos_int->sauna = $request->sauna;
                    $datos_int->piscina = $request->piscina;
                    $datos_int->salida_de_humos = $request->salida_de_humos;
                    $datos_int->save();
                    /* FIN DATOS INTERIORES */
                    
                    /* INICIO DATOS FINCA */
                    $datfinca = new Finca();
                    $datfinca->inmueble_id = $id_inmueble;
                    $datfinca->ascensor = $request->ascensor;
                    $datfinca->conserje = $request->conserje;
                    $datfinca->energia_solar = $request->energia_solar;
                    $datfinca->garage_privado = $request->garage_privado;
                    $datfinca->parking_comunitario = $request->parking_comunitario;
                    $datfinca->trastero = $request->trastero;
                    $datfinca->video_portero = $request->video_portero;
                    $datfinca->save();
                    //dd($datos_finca);
                    /* FIN DATOS FINCA */

                    /* INICIO DATOS EXTERIORES */
                    $datos_ext = new Exterior();
                    $datos_ext->inmueble_id = $id_inmueble;
                    $datos_ext->balcones = $request->balcones;
                    $datos_ext->vista_al_mar = $request->vista_al_mar;
                    $datos_ext->jardin_privado = $request->jardin_privado;
                    $datos_ext->patio = $request->patio;
                    $datos_ext->piscina_ext = $request->piscina_ext;
                    $datos_ext->piscina_comunitaria = $request->piscina_comunitaria;
                    $datos_ext->primera_linea_mar = $request->primera_linea_mar;
                    $datos_ext->terraza = $request->terraza;
                    $datos_ext->vista_montana = $request->vista_montana;
                    $datos_ext->zona_comunitaria = $request->zona_comunitaria;
                    $datos_ext->zona_deportiva = $request->zona_deportiva;
                    $datos_ext->zona_infantil = $request->zona_infantil;
                    $datos_ext->solo_chicas = $request->solo_chicas;
                    $datos_ext->solo_chicos = $request->solo_chicos;
                    $datos_ext->solo_no_fumadores = $request->solo_no_fumadores;
                    $datos_ext->gastos_comunidad = $request->gastos_comunidad;
                    $datos_ext->menos_2_mese_fianza = $request->menos_2_mese_fianza;
                    $datos_ext->save();
                    /* FIN DATOS EXTERIORES */

                    /* INICIO DATOS EXTRAS */
                    // Se crea el registro pero los datos se entran en el update
                    $extras = new Extra();
                    $extras->inmueble_id = $id_inmueble;
                    $extras->save();
                    /* FIN DE DATOS EXTRAS */

                    /* DEMANDAS COINCIDENTES */
                    // Se realiza una busqueda para ver si existen demandas coicidentes con el inmueble creado
                    
                    /* Busqueda por tipo de inmueble */
                    $tipo_inmueble = $inmueble->tipo_id;
                    //$valores = [$tipo_inmueble,$inmueble->tipo_id];
                    //$demandas = Demanda::where('tipo_inmueble_id',$tipo_inmueble)->get();
                    /* FIN DE LAS DEMANDAS COINCIDENTES */

                    return response()->json(['mensaje'          => 'El inmueble se guardo correctamente', 
                                             'inmuebleid'       => $ultimo_inmueble->id, 
                                             'inmueble'         => $ultimo_inmueble, 
                                             'tipo_inmueble'    => $tipo_inmueble,
                                             'habitaciones'     => $request->habitaciones,
                                             'zona'             => $request->zona
                                             ]);
                }else{
                    return response()->json(["mensaje" => "Ocurrió un error al intentar guardar el inmueble."]);
                }
            
            //return redirect()->route('inmuebles.index');
        }

    } 

    // Este metodo se utiliza cuando se crea un nuevo inmueble para determinar si alguna de las demandas existente 
    // tiene coincidencias con el inmueble
    public function match_demandas($tipo_inmueble, $zona){
        
        $demandas = Demanda::where('tipo_inmueble_id',$tipo_inmueble)
                            ->orWhere('zona',$zona)
                            ->get();
        $tipos = Tipo::all();
        $hab = '';
        $zonas = [];
        $habitaciones = [];

        foreach ($demandas as $demanda) {
            if ($demanda->inmueble_id > 0) {
                    $inmueble = $demanda->inmueble;
                    $modalidad = $inmueble->modalidad;
                    
                    // Habitaciones
                    if ($inmueble->habitaciones > 0) {
                        $hab = $inmueble->habitaciones;
                    }
                  
                    // Zona
                    $zona = $inmueble->zona;
                }else{    /* DEMANDA EN BASE A DESCRIPCION */
                    // Habitaciones
                    $hab = $demanda->habitaciones;
                    $zona = $demanda->zona;
                }
            $habitaciones[$demanda->id] = $hab;
            $zonas[$demanda->id] = $zona;
        }
        return View('inmuebles.sections.demandas')->with('demandas', $demandas)
                                                  ->with('tipos',$tipos)
                                                  ->with('zonas',$zonas)
                                                  ->with('habitaciones',$habitaciones);
    }

    public function ultimo_inmueble(){
        $ultimo_inmueble = Inmueble::orderBy('id','DES')->first();
        response()->json(["mensaje" => "Ultimo inmueble", 'ultimo_inmueble' => $ultimo_inmueble]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inmueble = Inmueble::findWithRelations($id);

        /* DOCUMENTOS DEL INMUEBLE */
        $inmueble->archivos;
        $documentos = [];
        $icono = '';
        $icoima = '';
        foreach ($inmueble->archivos as $archivo) {
            $filenameArray = explode('.', $archivo->nombre);

            $fileExtension = '.' . $filenameArray[count($filenameArray)-1];
            if ($fileExtension == '.xls' || $fileExtension == '.xlsx') {
                $icono = 'fa-file-excel-o';
                $icoima = 'xlsico.jpg';
            }elseif($fileExtension == '.doc' || $fileExtension == '.docx'){
                $icono = 'fa-file-word-o';
                $icoima = 'wordico.jpg';
            }elseif($fileExtension == '.pdf'){
                $icono = 'fa-file-pdf-o';
                $icoima = 'pdfico.jpg';
            }elseif($fileExtension == '.txt'){
                $icono = 'fa-file-text';
                $icoima = 'txtico.jpg';
            }else{
                $icono = 'fa-file';
                $icoima = 'incognitaico.jpg';
            }
            $documentos[] = ['nombre' => $archivo->nombre, 'extension' => $fileExtension, 'icono' => $icono,'imaico' => $icoima];
        }
        $videos = []; // Por implementar
        
        /* EXTRAS DEL INMUEBLE */
        $inmueble->extra;
        $operacion = ''; // Cadena para almacenar la modalidad Venta, Alquiler, ...
        $cadena_modena = ($inmueble->modena == 'EUR - Euro') ? 'EUR' : 'USD';
        
        $operacion = $this->concatenador($inmueble->modalidad->venta, $operacion, 'Venta',$inmueble->modalidad->ventaprecio, $inmueble->modalidad->ventaprecio2, $cadena_modena,''); 
        $operacion = $this->concatenador($inmueble->modalidad->alquiler_residencial, $operacion, 'Alquiler',$inmueble->modalidad->alqresprecio, $inmueble->modalidad->alqresprecio2, $cadena_modena,''); 
        $operacion = $this->concatenador($inmueble->modalidad->traspaso, $operacion, 'Traspaso',$inmueble->modalidad->traspasoprecio, $inmueble->modalidad->traspasoprecio2, $cadena_modena,''); 
        $operacion = $this->concatenador($inmueble->modalidad->opcion_compra, $operacion, 'Opción a Compra',$inmueble->modalidad->opcioncompraprecio, $inmueble->modalidad->opcioncompraprecio2, $cadena_modena,''); 
        $operacion = $this->concatenador($inmueble->modalidad->compartir, $operacion, 'Compartir',$inmueble->modalidad->compartirprecio, $inmueble->modalidad->compartirprecio2, $cadena_modena,$inmueble->modalidad->periodicidad); 
        if ($inmueble->modalidad->alquiler_vacacional == 1) {
            $operacion = $this->concatenador($inmueble->modalidad->alqvac_dia, $operacion, 'Alquiler Vacacional',$inmueble->modalidad->alqvac_dia_p, $inmueble->modalidad->alqvac_dia_pm2, $cadena_modena,'día'); 
            $operacion = $this->concatenador($inmueble->modalidad->alqvac_semana, $operacion, 'Alquiler Vacacional',$inmueble->modalidad->alqvac_semana_p, $inmueble->modalidad->alqvac_semana_pm2, $cadena_modena,'semana'); 
            $operacion = $this->concatenador($inmueble->modalidad->alqvac_quincena, $operacion, 'Alquiler Vacacional',$inmueble->modalidad->alqvac_quincena_p, $inmueble->modalidad->alqvac_quincena_pm2, $cadena_modena,'quincena');
            $operacion = $this->concatenador($inmueble->modalidad->alqvac_mes, $operacion, 'Alquiler Vacacional',$inmueble->modalidad->alqvac_mes_p, $inmueble->modalidad->alqvac_mes_pm2, $cadena_modena,'mes'); 
            $operacion = $this->concatenador($inmueble->modalidad->alqvac_temporada, $operacion, 'Alquiler Vacacional',$inmueble->modalidad->alqvac_temporada_p, $inmueble->modalidad->alqvac_temporada_pm2, $cadena_modena,'temporada'); 
            $operacion = $this->concatenador($inmueble->modalidad->alqvac_anno, $operacion, 'Alquiler Vacacional',$inmueble->modalidad->alqvac_anno_p, $inmueble->modalidad->alqvac_anno_pm2, $cadena_modena,'año'); 
        }

        /* DATOS INTERNOS */
        $inmueble_interno = $inmueble->interno;
        if (count($inmueble_interno) == 0) {
            $inmueble_interno = [];
        }
        $inmueble->via;
        /*$inmueble->distrito;*/  // Por implementar

        /* Moneda */
        if ($inmueble->moneda == 'EUR - Euro') {
           $tipoico = 'dollar';
        }elseif($inmueble->moneda == 'USD - Dólar estadounidense'){
            $tipoico = 'eur';
        }
        //dd($inmueble->via);
        return view('inmuebles.show', compact('inmueble', 'operacion','documentos','videos', 'tipoico', 'inmueble_interno'));
    }


    public function concatenador($verificar_modalidad, $operacion, $cadena, $precio1, $precio2, $cadena_modena,$periodicidad){
            if ($verificar_modalidad == 1) {
                if (strlen($operacion) >0) {
                    $operacion .= ', '; 
                }
                if ($precio1 > 0 && $precio2 > 0) {
                    return $operacion.''.$cadena.' '.$precio1.' '.$cadena_modena.' '.$periodicidad.' ('.$precio2.' '.$cadena_modena.'/m<sup>2</sup>)';
                }elseif($precio1 > 0 && $precio2 == 0){
                    return $operacion.''.$cadena.' '.$precio1.' '.$cadena_modena.' '.$periodicidad;
                }elseif($precio1 == 0 && $precio2 > 0){
                    return $operacion.''.$cadena.' '.$precio2.' '.$cadena_modena.'/m<sup>2</sup>'.' '.$periodicidad;
                }
            }else{
                return $operacion;
            }
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inmueble = Inmueble::find($id);
        $inmueble->tipo;
        $inmueble->categoria;        
        $inmueble->ciudad; 
        $inmueble->pais;
        $inmueble->via;
        $inmueble->promocion;
        $inmueble->entidad;
        $inmueble->modalidad;

        $tipos_estados = ['disponible'    => 'Disponible', 
                    'reservado'     => 'Reservado',
                    'captacion'     => 'Captación',
                    'nodisponible'  => 'No disponible',
                    'enconstruccion'=> 'En construcción'];
        $entidades = Entidad::all();

        // Agencia, Agentes y Promociones
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();

        if (count($agencia)>0) {
            $promociones = Promocion::where('agencia_id',$agencia[0]->id)->get();
            $agentes = Agente::where('agencia_id',$agencia[0]->id)->get();     
        }else{
            $promociones = [];
            $agentes = [];
        };

        if (count($inmueble->promocion)>0) {
           $promocion = $inmueble->promocion;
        }else{
            $promocion = [];
        };
        $clientes = Cliente::where('usuario_id',Auth::user()->id)->get();
        $tipologias = [];

        $monedas = ['EUR - Euro', 'USD - Dólar estadounidense'];

        $inmueble->extra;
        if ($inmueble->extra->url != null) {
            $url = $inmueble->extra->url;
        }else{
            $url = '';
        };

        $inmuima = $inmueble->imagenes;
        $inmufile = $inmueble->archivos;
        $inmueble_id = $inmueble->id;
        return view('inmuebles.edit', compact('inmueble','inmuima','inmueble_id','inmufile','entidades','agencia','agentes','clientes','promociones','promocion','tipologias','monedas','tipos_estados','url'));
        //return view('inmuebles.edit', compact())->with('inmueble',$inmueble,'inmuima',$inmuima,'inmufile',$inmufile,'categorias',$categorias,'tipos',$tipos,'entidades',$entidades,'paises',$paises,'municipios',$municipios,'vias',$vias,'pisoid',$pisoid,'agencia',$agencia,'promociones',$promociones,'tipologias',$tipologias,'pisos',$pisos,'monedas',$monedas,'idiomas',$idiomas,'tipos_estados',$tipos_estados,'url',$url);
    }

    public function extras($id){
        return View('inmuebles.sections.extras')->with('inmueble_id',$id);
    }

    public function refresh($inmueble_id){
            $inmueble = Inmueble::find($inmueble_id);
            $inmuima = $inmueble->imagenes;
           // return json_encode(['mensaje' => $inmuima]);
            return View('inmuebles.sections.tabla_ima')->with('inmuima', $inmuima)->with('inmueble', $inmueble);
    } 

    public function refreshfiles($inmueble_id){
            $inmueble = Inmueble::find($inmueble_id);
            $inmufile = $inmueble->archivos;
            return View('inmuebles.sections.tabla_file')->with('inmufile', $inmufile)->with('inmueble', $inmueble);
    }

    // Actualiza la tabla de inmuebles del cliente
    public function refreshTCI($cliente_id){
            $inmuebles_cliente = Inmueble::where('cliente_id',$cliente_id)->get();
            //$icid = $inmuebles_cliente->id;
            return View('clientes.sections.la_tabla_inmuebles')->with('inmuebles_cliente', $inmuebles_cliente[0]);
    } 

    public function portada($idinmueble,$idimagen){
        $inmueble = Inmueble::find($idinmueble);
        $imagen   = Imagen::find($idimagen);
        $inmueble->id_portada = $imagen->nombre;

        if ($inmueble->save()) {
            return response()->json(["mensaje" => "Se ha cambiado la imagen de portada del inmueble."]);
        }else {
            return response()->json(["mensaje" => "Ha ocurrido un error al intentar guardar los cambios."]);
        };
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
             // Formulario del edit principal
            if ($request->numform == 0) { 
                
                $inmueble = Inmueble::find($id);
                $inmueble->fill($request->all()); /* Fill the inputs with new values */
                $modalidad = Modalidad::find($inmueble->modalidad_id);
                $modalidad->fill($request->all());

                if ($inmueble->save() && $modalidad->save()) {
                    return response()->json(["mensaje" => "La información del Inmueble ha sido actualizada."]);
                }else{
                    return response()->json(["mensaje" => "Ha ocurrido un error al intentar editar la información del Inmueble."]);
                }
            }

            // Formulario del Edit de datos internos
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $inmueble = Inmueble::find($id);
        //$inmueble->active = 0;
        //$inmueble->save();
        $inmueble->delete();

        $message = 'Se ha eliminado el registro del inmueble REF: ';
        if ($request->ajax()) {
            return $message;
        };
        
    }

    public function getPropertiesLocation(Request $request){
        if ($request->ajax()) {
            $lat = $request->lat;
            $lng = $request->lng;

            $inmuebles_pos = Inmueble::whereBetween('lat',[$lat-0.5, $lat+0.5])
                                  ->whereBetween('lng',[$lng-0.5, $lng+0.5])
                                  ->get();

            return json_encode(['datos' => $inmuebles_pos]);
        }
    }

}
