<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pais;
use App\Idioma;
use App\Municipio;
use App\Via;
use App\Cliente;
use App\Tipo;
use App\Categoria;
use App\Agencia;
use App\Promocion;
use App\Entidad;
use App\Inmueble;
use App\Modalidad;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id !== null) {
            return $this->show($id);
        };

        $clientes = Cliente::where('usuario_id',Auth::user()->id)->get();

        $clientes->each(function($clientes){
                $clientes->inmuebles;
            });

        // Construimos la cadena de texto a mostrar en la tabla de clientes
        // Especificamente en el campo Ofertante (inmuebles del cliente)
        $string_modalidad = [];
        $string_temp = '';
        $contador_ventas = 0;
        $contador_alquiler = 0;
        $contador_otros = 0;
        $contador_oportunidad = 0;
        $j = 0;
        foreach ($clientes as $c) {
            foreach ($c->inmuebles as $i) {
                if ($i->modalidad->venta == 1) {   
                    $contador_ventas++; 
                }
                if ($i->modalidad->alquiler_residencial == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alquiler_vacacional == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_dia == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_semana == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_quincena == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_mes == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_temporada == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_anno == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->opcion_compra == 1) {
                    $contador_oportunidad++;
                }
                if ($i->modalidad->traspaso == 1) {
                    $contador_oportunidad++;
                }
            }
            // Si el cliente tiene algun inmueble en venta ...
            if ($contador_ventas == 1) {
                $string_temp .= $contador_ventas." Venta";
            }elseif ($contador_ventas > 1) {
                 $string_temp .= $contador_ventas." Ventas";
            }
            if ($contador_alquiler > 0) {
                $string_temp = $this->coma($string_temp);
                $string_temp .= $contador_alquiler." Alquiler";
            }
            if ($contador_oportunidad == 1) {
                $string_temp = coma($string_temp);
                $string_temp .= "Oportunidad ".$contador_oportunidad;
            }elseif($contador_oportunidad > 1){
                $string_temp = $this->coma($string_temp);
                $string_temp = "Oportunidades ".$contador_oportunidad;
            }

            $string_modalidad[$c->id] =  $string_temp;
            $j++;
            $contador_ventas = 0;
            $contador_alquiler = 0;
            $contador_otros = 0;
            $contador_oportunidad = 0;
            $string_temp = '';
        }
        return view('clientes.index', compact('clientes','string_modalidad'));
    }

    public function coma($cadena){
        if ((strlen($cadena)>0)) {
            return $cadena .= ', ';
        }
        else
        {
            return '';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente(); // Se crea este objeto vacio para pasarlo a la vista en los inputs value, asi se utiliza el mismo formulario al crear clientes y al editarlos
        // Agencia y Promciones
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();

        if (count($agencia)>0) {
            $promociones = Promocion::where('agencia_id',$agencia[0]->id)->get();
        }else{
            $promociones = [];
        };
        $tipologias = [];
        $inmuebles_cliente = [];
        $entidades = Entidad::all();
        $monedas = ['EUR - Euro', 'USD - Dólar estadounidense'];
        $pisoid = 1;
        $pisos = ['Sótano', 'Subsótano', 'Bajos', 'Entresuelo','Principal','1ro','2do','3ro','4to','5to'];
        return view('clientes.create', compact('cliente','pisos','pisoid','promociones','tipologias','entidades','monedas','inmuebles_cliente'));
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
                'nombre.required'       => 'Debe ingresar el nombre del cliente.',
                'nombre.min'            => 'El nombre del cliente debe tener al menos 3 caracteres.',
                'apellidos.required'    =>'El apellido del cliente es obligatorio.',
                'tipo_doc.required'     => 'El tipo de documento es obligatorio.',
                'tipo_doc_num.required' => 'Entre un número de documento.',
                'tipo_cliente.required' => 'Entre el tipo de cliente.',
                'estado.required'       => 'Falta el estado del cliente.',
                'pais_id.required'      => 'El país del cliente es obligatorio.',
                'comentarios.required'  => 'Debe poner algún comentario del cliente.',
            ];
            $this->validate($request,[
                'nombre'        => 'required|min:3',
                'apellidos'     => 'required',
                'tipo_doc'      => 'required',
                'tipo_doc_num'  => 'required',
                'tipo_cliente'  => 'required',
                'estado'        => 'required',
                'pais_id'       => 'required',
                'comentarios'   => 'required',
                ],$messages);
            $cliente = new Cliente();
            $cliente->usuario_id = Auth::user()->id;
            $cliente->fill($request->all());
            if ($cliente->save()) {
                $nuevo_cliente = Cliente::orderBy('id','DES')->first();
                $path_base = base_path();
                $path_public = public_path();
                $url_base = url('/');
                return response()->json(["mensaje" => "Se ha dado de alta al nuevo cliente.", 'idcliente' => $nuevo_cliente->id, 'path_base'=> $path_base, 'path_public' => $path_public, 'url_base' => $url_base ]);
            }else{
                return response()->json(["mensaje" => "Ocurrió un error al intentar dar de alta al cliente."]);
            }
        }
    }

    public function alta_rapida(Request $request)
    {
        if ($request->ajax()) {
            $messages = [
                'nombre.required'       => 'Debe ingresar el nombre del cliente.',
                'nombre.min'            => 'El nombre del cliente debe tener al menos 3 caracteres.',
            ];
            $this->validate($request,[
                'nombre'        => 'required|min:3'
                ],$messages);
            $cliente = new Cliente();
            $cliente->usuario_id = Auth::user()->id;
            $cliente->fill($request->all());
            if ($cliente->save()) {
                $ultimo_cliente = Cliente::orderBy('id','DES')->first();
                $nombrecliente = $ultimo_cliente->nombre;
                $idcliente = $ultimo_cliente->id;
                return response()->json(["mensaje" => "Se ha agregado el nuevo cliente", 'nombrecliente' => $nombrecliente, 'idcliente' => $idcliente ]);
            }else{
                return response()->json(["mensaje" => "Ocurrió un error al intentar dar de alta al cliente."]);
            }
        }
    }

    public function inmuebles($id_cliente){

        $cliente = Cliente::find($id_cliente);
        $cliente_nombre = $cliente->nombre;

        $inmuebles = Inmueble::where('cliente_id',$id_cliente)->get();
        $inmuebles->each(function($inmuebles){
                $inmuebles->imagenes;
                $inmuebles->modalidad;
            });

        // Agencia y Promociones
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();

        if (count($agencia)>0) {
            $promociones = Promocion::where('agencia_id',$agencia[0]->id)->get();
        }else{
            $promociones = [];
        };
        $tipologias = [];
        $entidades = Entidad::all();
        $pisos = ['Principal','1ro','2do','3ro','4to','5to','Sótano','Subsótano','Bajos','Entresuelo'];
        $pisoid = 1;
        $monedas = ['EUR - Euro', 'USD - Dólar estadounidense'];

        //Imagen de Portada del Inmueble
        $ima = [];
        foreach ($inmuebles as $i) {
                if ($i->id_portada !== null) {
                    $ima[] = $i->id_portada;
                }else{
                    $ima[] = (count($i->imagenes)>0) ? $i->imagenes[0]->nombre : '';
                }
            };
        $contador_ima = 0;
        // Extrayendo la lista de Tipos de Inmuebles
            $tipos = Tipo::select('id','nombre')->get();
            $arregloTipos = [];
            foreach ($tipos as $t) {
                $arregloTipos[$t->id] = $t->nombre;
            };
        // Extrayendo la lista de Municipios
            $mun = Municipio::select('id','nombre')->get();
            $arregloMun = [];
            foreach ($mun as $m) {
                $arregloMun[$m->id] = $m->nombre;
            };

        return view('clientes.inmuebles',compact('id_cliente','cliente_nombre','inmuebles','ima','contador_ima','arregloTipos','arregloMun','promociones','tipologias','entidades','pisos','pisoid','monedas'));
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
        $cliente = Cliente::find($id);
        $pisoid = 1;
        $pisos = ['Sótano', 'Subsótano', 'Bajos', 'Entresuelo','Principal','1ro','2do','3ro','4to','5to'];
        return view('clientes.edit',compact('cliente', 'pisos','pisoid'));
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
        $cliente = Cliente::find($id);
        $cliente->fill($request->all());
        if ($cliente->update()) {
                return redirect('/clientes');
            }else{
                return view('cliente.edit',compact('cliente'));
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
        $cliente = Cliente::find($id);
        $cliente->delete();

        $message = 'Se ha eliminado el registro del cliente';
        if ($request->ajax()) {
            return $message;
        };
    }
}
