<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\User;
use App\Http\Requests;
use App\DemandaRapida;
/*use App\SendMail;*/

class DemandaRapidaController extends Controller
{
   /* protected $sendmail;

    public function __construct(SendMail $sendmail){
        $this->sendmail = $sendmail;
    }*/

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
                /*$this->sendmail->sendMail($request->email);*/
                /* The email to the Admin contains the username, the email and the description
                of the fast demands request that has results in the database */ 
                $datos = [$obtenerInmuebles, $request->name, $request->lastname, $request->telephone, $request->email, $request->descripcion];
                $id_destinatario = 5; 
                $this->sendEmailToAdmin($datos, $id_destinatario);
                return ['message' => 'Su solicitud de búsqueda de imueble se ha enviado correctamente. Le envíaremos vía email los resultados coincidentes con sus intereses.'];
            }else{
                return ['message' => 'Ha ocurrido un error al intentar realizar su búsqueda de inmuebles.'];
            }
    	} 
    }

    /* Send an emai to RealState360 admin with the users fast demans result */ 
    public function sendEmailToAdmin($datos, $id_destinarario)
    {
        $user = User::findOrFail($id_destinarario);

        Mail::send('Homepage.emails.reporte_demanda_rapida', ['user' => $user, 'inmuebles' => $datos[0], 'username' => $datos[1], 'lastname' => $datos[2], 'telephone' => $datos[3], 'email' => $datos[4], 'descripcion' => $datos[5]], function ($m) use ($user) {
            $m->from('admin@realstate360.com', 'RealState360');

            $m->to('info@realstate360.com', $user->name)->subject('Reporte de Demanda Rapida de Inmuebles');
        });
    }
    
}
