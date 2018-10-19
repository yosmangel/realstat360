<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Idioma;
use App\Agente;
use App\Agencia;
use Auth;

class AgentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id = null)
    {
        if ($id != null) {
            return $this->show($id);
        }else{
            $agencia = Agencia::where('user_id', Auth::user()->id)->get();

            $agentes = Agente::where('agencia_id',$agencia[0]->id)->get();
            //dd($agentes);
            if (count($agentes) > 0) {
                $contacto = '';
                $contactos = [];
                $cont_email = '';
                $contactosemail = [];
                foreach ($agentes as $agente) {
                    $contacto = $this->strconstructor($contacto, $agente->telefono);
                    $contacto = $this->strconstructor($contacto, $agente->movil);
                    $contacto = $this->strconstructor($contacto, $agente->fax);
                    $contactos[$agente->id] = $contacto;
                    $contactoemail[$agente->id] = $agente->email;
                    $contacto = '';
                }
                return view('agentes.index',compact('agentes', 'contactos','contactoemail'));
            }
            $agentes = [];
            return view('agentes.index', compact('agentes'));
        }
    }

    public function strconstructor($cadena1,$cadena2){
        if (strlen($cadena1) > 0) {
            if (strlen($cadena2) > 0) {
                return $cadena1.', '.$cadena2;
            }
            return $cadena1;
        }
        return $cadena2;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idiomas = Idioma::all();
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();
        if (count($agencia) == 0) {
            $agencia = '';
        }else{
            $agencia = $agencia[0];
        }
        return view('agentes.create',compact('idiomas', 'agencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
                    'nombre.required'           => 'Debe ingresar el nombre del Agente.',
                    'apellidos.required'        => 'Debe ingresar los apellidos del Agente.',
                    'rol.required'              => 'Selecciones un rol de usuario para el Agente.',
                    'departamento.required'     => 'Debe ingresar el Departamento.',
                    'cargo.required'            => 'Debe ingresar el Cargo.',
                    'estado.required'           => 'Seleccione el Estado.',
                    'fecha_alta.required'       => 'Ingrese la Fecha de Alta'
                ];
        $this->validate($request,[
                    'nombre'        => 'required',
                    'apellidos'     => 'required',
                    'rol'           => 'required',
                    'departamento'  => 'required',
                    'cargo'         => 'required',
                    'estado'        => 'required',
                    'fecha_alta'    => 'required'
                    ],$messages);
        $agente = new Agente();
        $agente->tratamiento = $request->tratamiento;
        $agente->nombre = $request->nombre;
        $agente->apellidos = $request->apellidos;
        $agente->idioma_id = $request->idioma_id;
        $agente->color = $request->color;
        $agente->acceso = $request->acceso;
        $agente->rol = $request->rol;
        // Horario
        $agente->lun_man = $request->lun_man;
        $agente->lun_tar = $request->lun_tar;
        $agente->mar_man = $request->mar_man;
        $agente->mar_tar = $request->mar_tar;
        $agente->mie_man = $request->mie_man;
        $agente->mie_tar = $request->mie_tar;
        $agente->jue_man = $request->jue_man;
        $agente->jue_tar = $request->jue_tar;
        $agente->vie_man = $request->vie_man;
        $agente->vie_tar = $request->vie_tar;
        $agente->sab_man = $request->sab_man;
        $agente->sab_tar = $request->sab_tar;
        $agente->dom_man = $request->dom_man;
        $agente->dom_tar = $request->dom_tar;
        $agente->clientes_permitidos = $request->clientes_permitidos;
        $agente->acciones_permitidas = $request->acciones_permitidas;
        $agente->inmuebles_permitidos = $request->inmuebles_permitidos;
        $agente->telefono = $request->telefono;
        $agente->telefono_de = $request->telefono_de;
        $agente->telefono2 = $request->telefono2;
        $agente->telefono_de2 = $request->telefono_de2;
        $agente->movil = $request->movil;
        $agente->movil_de = $request->movil_de;
        $agente->movil2 = $request->movil2;
        $agente->movil_de2 = $request->movil_de2;
        $agente->fax = $request->fax;
        $agente->fax_de = $request->fax_de;
        $agente->fax2 = $request->fax2;
        $agente->fax_de2 = $request->fax_de2;
        $agente->email = $request->email;
        $agente->email_de = $request->email_de;
        $agente->agencia_id = $request->agencia_id;
        $agente->departamento = $request->departamento;
        $agente->cargo = $request->cargo;
        $agente->estado = $request->estado;
        $agente->fecha_alta = $request->fechaalta;
        if ($agente->save()) {
            return redirect()->route('agentes.index');
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
        $agente = Agente::find($id);
        $agente->idioma;
        $idiomas = Idioma::all();
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();
        
        return view('agentes.edit', compact('agente','agencia','idiomas'));
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
            $agente = Agente::find($id);
            $agente->fill($request->all());
            if ($agente->save()) {
                return response()->json(["mensaje" => "Los datos del Agente han sido actualizados correctamente."]);
            }else{
                return response()->json(["mensaje" => "Ha ocurrido un error al intentar actuaizar los datos del Agente."]);
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
        $agente = Agente::find($id);
        $agente->delete();

        $agentes = Agente::all();
        $message = 'Se ha eliminado el registro del agente ';
        if ($request->ajax()) {
            if (count($agentes) == 0) {
                $cantidad = 0;
                return $cantidad;
            }
            return $message;
        };
        
    }
}
