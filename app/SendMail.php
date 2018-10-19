<?php

namespace App;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Auth;

class SendMail
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMail($email) 
    {
        /*
            Envia mensaje a los usuarios demandantes.
        */
        $link = 'www.realstate360.com';
        $message = sprintf('Inmuebles Coincidentes con los requerimientos de búsqueda que especificó en RealState360 %s', $link);
        
        $this->mailer->raw($message, function (Message $m) use ($email) {
            $m->to($email)->subject('Resultados de su Búsqueda de Inmuebles en RealState360.com');
        });
    }
}