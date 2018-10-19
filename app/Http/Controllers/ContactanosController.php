<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactanosController extends Controller
{
    /* Este controlador se encarga del cotacto de los usuarios con el administrador del Sistema */
    
    public function sendContactMail(Request $request){
        if ($request->ajax()) {
    		$messages = [
                'description.required'  => 'Por favor, escriba el contenido del mensaje que nos desea enviar.',
                'description.min'       => 'Escriba un mensaje un poco más largo.',
                'name.required'         => 'Por favor, escriba su nombre para poder contactarlo.',
                'email.required'        => 'Debe ingresar su correo electrónico para poder contactarlo.',
                'email.email'           => 'Debe ingresar un correo electrónico válido.',
                'subject.required'      => 'Debe poner el asunto del mensaje.'
                
            ];

            $this->validate($request,[
                'description' 	=> 'required|min:15',
                'name'			=> 'required',
                'email'			=> 'required|email',
                'subject'       => 'required'
            	],$messages);
            
            /* The email to the Admin contains the username, the email and the description
            of the fast demands request that has results in the database */ 
            $datos = [$request->name, $request->email, 'RealState360 - '.$request->subject, $request->description];
            $destinatario = ['info@realstate360.com', 'Admin RealState360'];
            $this->sendEmailToAdmin($datos, $destinatario);
            $this->sendConfirmationEmail($request->name, $request->email);
            return ['message' => 'Su mensaje ha sido enviado exitosamente. En breve estaremos respondiendo a su solicitud.'];
    	}
    }

    /* Send an emai to RealState360 admin with the users fast demans result */ 
    public function sendEmailToAdmin($datos, $destinatario)
    {
        $data = [$datos, $destinatario];
        Mail::send('Homepage.emails.contact_us', ['username' => $datos[0], 'email' => $datos[1], 'subject' => $datos[2], 'description' => $datos[3]], function ($m) use($data) {
            $m->from('admin@realstate360.com', $data[0][2]);
            $m->to('info@realstate360.com', $data[1][1])->subject($data[0][2]); //data[1][0]
        });
    }

    /* Send an emai to RealState360 admin with the users fast demans result */ 
    public function sendConfirmationEmail($username, $email)
    {
        $datos = [$username, $email];
        Mail::send('Homepage.emails.contact_us_confirm', ['username' => $datos[0]], function ($m) use ($datos) {
            $m->from('admin@realstate360.com', 'RealState360');
            $m->to($datos[1], $datos[0])->subject('Confirmación de Solicitud de Contacto');
        });
    }
}
