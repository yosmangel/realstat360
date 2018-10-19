<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DemandaRapida;
use App\User;
use App\SendMail;

class DemandaRapidaController extends Controller
{
    protected $sendmail;

    public function __construct(SendMail $sendmail){
        $this->sendmail = $sendmail;
    }

    public function store(Request $request){
    	if ($request->ajax()) {
    		$messages = [
                /*'tipo.required' 		=> 'Seleccione el tipo de Inmueble que busca.',*/
                'descripcion.required'  => 'Por favor, escriba una descripción de los que está buscando.',
                'descripcion.min'       => 'Escriba una descripción un poco más larga.',
                'name.required'         => 'Por favor, escriba su nombre para poder contactarlo.',
                'email.required'        => 'Debe ingresar su correo electrónico para poder contactarlo.',
                'email.email'           => 'Debe ingresar un correo electrónico válido.',
                /*'provincia.required'    => 'Seleccione la provincia en la que desea realizar la búsqueda.',
                'ciudad.required' 	    => 'Seleccione la ciudad en la que desea realizar la búsqueda.',*/
            ];

            $this->validate($request,[
                'descripcion' 	=> 'required|min:8',
                'name'			=> 'required',
                'email'			=> 'required|email',
            	],$messages);

            $demanda = new DemandaRapida();
            $demanda->fill($request->all()); 
            $demanda->tipo = 2;
            $demanda->provincia = 1;
            $demanda->ciudad = 1;

            if ($demanda->save()) {
                $obtenerInmuebles = DemandaRapida::getProperties($request->email);
                $this->sendmail->sendMail($request->email);
                return ['message' => 'Su solicitud de búsqueda de imueble se ha enviado correctamente. Le envíaremos vía email los resultados coincidentes con sus intereses.'];
            }else{
                return ['message' => 'Ha ocurrido un error al intentar realizar su búsqueda de inmuebles.'];
            }
    	} 
    }

    
}
