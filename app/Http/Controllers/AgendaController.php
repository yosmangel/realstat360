<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Agenda;
use App\Inmueble;
use Auth;

class AgendaController extends Controller
{   
    /* Validation Arrays */
    private $messages = [
                'title'                => 'Escriba un título para el evento o actividad relativo al inmueble.',
                'inmueble_id.required' => 'Seleccione un inmueble para establacer el evento o actividad.',
                'date.required'        => 'Seleccione la fecha para la actividad.',
                'description.required' => 'Debe ingresar al menos una descripción corta de la actividad'
            ]; 
    private $rules = [
                'title'        => 'required',
                'inmueble_id'  => 'required',
                'date'         => 'required',
                'description'  => 'required'
            ];

    public function index(){
        $inmuebles = Inmueble::getUserProperties();
        $eventos = Agenda::getUserEvents();
    	return view('Homepage.propietaries.agenda', compact('eventos','inmuebles','title'));
    }

    public function store(Request $request){
        if ($request->ajax()) {
            $this->validate($request, $this->rules, $this->messages);
            $evento = new Agenda($request->all()); 
            $evento->user_id = Auth::user()->id;
            $evento->active = 1;
            if ($evento->save()) {
                return ['message' => 'El nuevo evento ha sido guardado en la Agenda de Inmuebles', 'evento' => $evento];
            }else{
                return ['message' => 'Ha ocurrido un error al intentar guardar el evento en la Agenda de Inmuebles'];
            }
        }
    }

    public function destroy($id){
        $evento = Agenda::find($id);
        $evento->active = 0;
        if ($evento->save()) {
            return ['message' => 'Se ha elminado el evento de la Agenda.'];
        }
        return ['message' => 'Ha ocurrido un error al intentar eliminar el evento de la Agenda.'];
    }
}
