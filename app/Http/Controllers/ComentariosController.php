<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inmueble;


class ComentariosController extends Controller
{
    
	public function index($id = null){
		if ($id != null) {
			return $this->show($id);
		};
		$inmuebles = Inmueble::getUserProperties();
		$inmuebles->each(function($inmuebles){
			$inmuebles->comentarios;
			$inmuebles->imagenPortada;
            $inmuebles->modalidad;
		});
		return view('Homepage.comments.index', compact('inmuebles'));
	}

    public function conversacion($id,$user_id){

        $inmueble = Inmueble::find($id);
        //$tipos = Tipo::all();
        //$ciudades = $this->ciudades;

        $interesado = User::find($user_id);
        if (Auth::check()) { 
            // Solicitudes de Contacto al usuario actual, por interes en un inmueble
           // $contacto = Contacto::where('propietario_id','=',Auth::user()->id)->get();
          //  $alertas = Contacto::where('propietario_id','=',Auth::user()->id)
                                //->where('flag','=',2)
                                //->get();
            //$aceptadas = Contacto::where('propietario_id','=',Auth::user()->id)
                                 //->where('flag','=',1)
                                //->get();
            //$enviadas = Contacto::where('user_id','=',Auth::user()->id)
                                //->where('flag','=',2)
                                //->get();
            //$contestadas = Contacto::where('user_id','=',Auth::user()->id)
                                //->where('flag','=',1)
                                //->get();
            // Se verifica si el usuario autenticado es el propietario del inmuebles
            // De ser asi se muestra el formulario correspondiente
            $comments = $inmueble->comments;
            
            return view('inmueble.conversacion', compact('inmueble'));
            //return view('inmueble.conversacion', compact('inmueble','tipos','ciudades','contacto','alertas','aceptadas','enviadas','contestadas','comments','inicio', 'interesado'));
          
        }else{
            return redirect()->guest('login');
        }
    }

    public function show($id){
    	return 'ok';
    }
}
