<?php

namespace App;

use Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class ActivationService
{

    protected $mailer;
    protected $activationRepo;
    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {

        if ($user->verified || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);

        $link = route('user.activate', $token);
        $message = sprintf('<a href="%s">%s</a>', $link, $link);

        Mail::send('Homepage.emails.confirmacion_cuenta', ['user' => $user, 'activacion' => $link], function ($m) use ($user) {
            $m->from('admin@realstate360.com', 'RealState360');
            $m->to($user->email, $user->name)->subject('Correo de Activación de Cuenta en RealState360');
        });

        /*$this->mailer->raw($message, function (Message $m) use ($user) {
            $m->to($user->email)->subject('Correo de Activación de Cuenta');
        });*/
    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }
        $user = User::find($activation->user_id);
        $user->verified = true;
        $user->save();
        $this->activationRepo->deleteActivation($token);

        return $user;
    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}