<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contacto;
use App\Inmueble;
use Auth;

class ContactoController extends Controller
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
        };
        $inmuebles = Contacto::contactsByProperty(currentUser()->id)->orderBy('inmueble_id','ASC')->get();
        $inmuebles->each(function($inmuebles){
            $inmuebles->inmueble;
        });
        /*$contactos->each(function($contactos){
			$contactos->comentarios;
			$contactos->imagenPortada;
            $contactos->modalidad;
        });*/
        
		return view('Homepage.contacts_propietaries_demands.index', compact('inmuebles'));
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

    public function askForStablishContact(Request $request){
        return ['mensaje' => 'inmueble = '.$request->inmueble_id.' propietario_id = '.$request->propietario_id];
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
            $contacto = new Contacto();
            $contacto->fill($request->all());
            $contacto->user_id = Auth::user()->id;
            $contacto->flag = 2;
            
            if ($contacto->save()) {
                return ['message' => 'Se le ha enviado la solicitud de contacto al propietario'];
            }else{
                return ['message' => 'Ha ocurrido un error al intentar enviar su solicitus de contacto'];
            }

            // Se determina el perfil del usuario interesado
            // Este codigo aun no se esta implementando en esta version
            /*$perfil_id = Auth::user()->perfil_id;
            $perfil = Perfil::find($perfil_id);
            $contacto->perfil_interesado = $perfil->name;*/
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
