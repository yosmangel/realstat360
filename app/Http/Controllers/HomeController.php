<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Agencia;
use App\Agente;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','profesionales']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::check()) {
            return view('auth.login');
        }
        $fecha = Date('d-D-M-Y');
        $arrayFecha = explode('-', $fecha);
        switch ($arrayFecha[1]) {
            case 'Mon': 
                $dia_sem =  'Lunes';
                break;
            case 'Tue': 
                $dia_sem =  'Martes';
                break;
            case 'Wed':
                $dia_sem =  'Miércoles';
                break;
            case 'Thu': 
                $dia_sem =  'Jueves';
                break;
            case 'Fri': 
                $dia_sem =  'Viernes';
                break;
            case 'Sat':
                $dia_sem =  'Sábado';
                break;
            case 'Sun':
                $dia_sem =  'Domingo';
                break;
            }
        switch ($arrayFecha[2]) {
            case 'Jan': 
                $mes =  'Enero';
                break;
            case 'Feb': 
                $mes =  'Febrero';
                break;
            case 'Mar':
                $mes =  'Marzo';
                break;
            case 'Apr': 
                $mes =  'Abril';
                break;
            case 'May': 
                $mes =  'Mayo';
                break;
            case 'Jun': 
                $mes =  'Junio';
                break;
            case 'Jul':
                $mes =  'Julio';
                break;
            case 'Aug':
                $mes =  'Agosto';
                break;
                case 'Sep': 
                $mes =  'Septiembre';
                break;
            case 'Oct': 
                $mes =  'Octubre';
                break;
            case 'Nov':
                $mes =  'Noviembre';
                break;
            case 'Dec':
                $mes =  'Diciembre';
                break;
            }
        $acciones = 0;

        // Agencia
        $agencia = Agencia::where('user_id', Auth::user()->id)->get();
        // Agentes
        $agentes = Agente::where('agencia_id', $agencia[0]->id)->get();
        return view('home', compact('dia_sem', 'arrayFecha', 'mes', 'acciones', 'agentes'));
    }

}
