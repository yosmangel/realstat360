<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inmueble;
use App\Tipo;
use App\Provincia;
use App\Ciudad;
use App\DemandaRapida;
use App\PreferenciaDemandante;
use Auth;

class PanelDemandaController extends Controller
{
    public function index(){
        /*
            Obtenemos los inmuebles que coincidan con las demandas que haya realizado
            el usuario actual.
        */
        //$obtenerInmuebles= DemandaRapida::getDemands(Auth::user()->email);
        $tipos = Tipo::all();
        $provincias = Provincia::all();
        $ciudades = Ciudad::all();
    	
        return view('Homepage.demands.index', compact('allLocals','tipos','provincias','ciudades'));
    }

    /* 
		Preferencias del Usuario Demanda para el match con la oferta de Inmuebles
    */
    public function preferences(){
    	$title = 'Preferencias para la Búsqueda de Inmueble';
        $preferencias = Auth::user()->preferenciasDemandante->first();
        
        /* Initializing all preferences checkboxs as not checked */
        $preferenciasArray['tratar_solo_propietarios'] = '';
        $preferenciasArray['compra'] = '';
        $preferenciasArray['arrienda'] = '';

        /* If there are previous preferences, the selecteds as true
        are passed to the preferenciasArray, next them will be
        used to mark the checkbox as chechek in the form */
        if (count($preferencias) > 0) {
            if ($preferencias->tratar_solo_propietarios) {
                $preferenciasArray['tratar_solo_propietarios'] = 'checked';
            }
            if ($preferencias->compra) {
                $preferenciasArray['compra'] = 'checked';
            }
            if ($preferencias->arrienda) {
                $preferenciasArray['arrienda'] = 'checked';
            }
        }
    	return view('Homepage.demands.preferences', compact('title','preferenciasArray'));
    }

    public function setPreferences(Request $request){
        if ($request->ajax()) {
            $user_id = Auth::user()->id;
            $ok = false;
            $existenPreferencias = PreferenciaDemandante::preferencesAlready($user_id);
            if($existenPreferencias>0){
                $preferencias = PreferenciaDemandante::find($existenPreferencias);
                $preferencias->fill($request->all());
                $preferencias->user_id = $user_id;
                if ($preferencias->save())  $ok = true ;
            }else{
                $preferencias = new PreferenciaDemandante();
                $preferencias->fill($request->all());
                $preferencias->user_id = $user_id;
                if ($preferencias->save())  $ok = true ;
            };
            if ($ok) {
                return json_encode(['message' => 'Se han guardado correctamente sus preferencias de búsqueda de inmuebles.']);
            }else{
                return json_encode(['message' => 'Ha ocurrido un error al intentar guardar sus preferencias.']);
            }
        }
    }

    /*
        Para el formulario de Busqueda Avanzada desde el panel de los usuarios Demanda de Inmuebles
    */
    public function searchProperties(Request $request){
        if ($request->ajax()) {
            $array_keywords = explode(' ', strtoupper($request->descripcion));
           
            $solo_venta = 0;
            $solo_alquiler = 0;
            if (in_array(strtoupper('venta'),$array_keywords)) {
                $solo_venta = 1;
            }
            if (in_array(strtoupper('alquiler'),$array_keywords)) {
                $solo_alquiler = 1;
            }

            $Xdescripcion = [];
            /* Recorremos cada una de las palabras de la busqueda */
            foreach ($array_keywords as $keyword) {
                /* La siguiente funcion  devolvera los
                    inmuebles que coincidan con las palabras claves
                    de la lista.
                */
                if (strlen($keyword) > 3) {
                    $query = Inmueble::search($keyword)->orderBy('inmuebles.id','DESC')->get();
                    $query->each(function($query){
                        $query->ciudad;
                        $query->tipo;
                    });
                    /* Se convierte el resultado en un array para poder despues 
                    eliminar los repetidos */
                    foreach ($query as $q) {
                        if ($solo_venta) {
                            if ($q->venta) {
                                $Xdescripcion[] = $q; 
                            }
                        }
                        if ($solo_alquiler) {
                            if ($q->alquiler_residencial) {
                                $Xdescripcion[] = $q; 
                            }
                        }
                    }
                }
            } 
            $Xdescripcion = unique_multidim_array($Xdescripcion,'id');
            /* Devolvemos el array de los inmuebles encontrados
            habiendo eliminado los inmuebles repetidos, ya que dos 
            palabras claves pueden haber arrojado un mismo inmueble */

            /*foreach ($Xdescripcion as $propertyFound) {
                if ($propertyFound['venta'] && !$propertyFound['alquiler_residencial']) {
                    # code...
                }
            } */


            /* Adding a token to each elements foud. This token will be used in the formularo of contact
                as the Verify CSRF token, because this formulary will be inserted in the DOM and the 
                csrf_token() function can,t be used to generate the token
            */
            $XpropertiesFoundAndTokenCSRF = [];
            foreach ($Xdescripcion as $propertyFound) {
                $XpropertiesFoundAndTokenCSRF[] = [$propertyFound, csrf_token()];
            }

            return json_encode(['resultadoInmuebles' => $XpropertiesFoundAndTokenCSRF]);
        }
    }

    

   
}
