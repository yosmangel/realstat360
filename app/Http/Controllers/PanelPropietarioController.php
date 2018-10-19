<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inmueble;
use App\PreferenciaPropietario;
use App\Tipo;
use App\Provincia;
use App\Ciudad;
use App\Imagen;
use App\Modalidad;
use App\Interior;
use App\Agencia;
use Auth;

class PanelPropietarioController extends Controller
{
    
    /*
        Attribs
    */
    /* Validation Arrays */
    private $messages = [
                'tipo_id.required'           =>'Seleccione el tipo de inmueble.',
                'ciudad_id.required'         => 'Seleccione la ciudad.',
                'descripcion_corta.required' => 'Debe ingresar al menos una descripción corta del inmueble'
            ]; 
    private $rules = [
                'tipo_id'           => 'required|numeric',
                'ciudad_id'         => 'required',
                'descripcion_corta' => 'required'
            ];


    public function index(){ 
    	$title = 'Panel de Propietarios';
    	$inmuebles = Inmueble::getProperties();
    	$inmuebles->each(function($inmuebles){
    		$inmuebles->imagenPortada;
            $inmuebles->modalidad;
            $inmuebles->interiores;
            $inmuebles->agendas->where('active','=',1);
        });
        
        return view('Homepage.propietaries.index', compact('title', 'inmuebles'));
    }

    /**
     * Show the form for creating a new Property (Inmueble).
     * Used from the Propietary Control Panel
     *
     * @return \Illuminate\Http\Response
     */
    public function createFromPropietary()
    { 
        $inmueble = new Inmueble();
        $inmueble->modalidad;
        $inmueble->tipo;
        $inmueble->interiores;
        $title = 'Alta de Inmuebles';
        return view('Homepage.propietaries.create',compact('inmueble','title'));
    }

    public function storeFromPropietary(Request $request){
    	if ($request->ajax()) {
    		$this->validate($request, $this->rules, $this->messages);
    		$inmueble = new Inmueble;
            $inmueble->tipo_id = $request->tipo_id;
            $inmueble->ciudad_id = $request->ciudad_id;
            $inmueble->codigo_postal = $request->codigo_postal; 
            $inmueble->calle = $request->calle;
            $inmueble->numero = $request->numero;
            $inmueble->descripcion_corta = $request->descripcion_corta;
            $inmueble->usuario_id = Auth::user()->id;
            $inmueble->categoria_id = 12; // 12: Indiferente. This is the defauls category.
            $inmueble->entidad_id = 5; // 12: No Definida. This is the defauls category. 
            $agencia = Agencia::getAgencyId()->get(); 
            $inmueble->agencia_id = $agencia[0]->id;
            $inmueble->provincia_id = 1; // Province Location Madrid
            $inmueble->pais_id = 1; // Country Location Madrid
            $inmueble->via_id = 1; // Default: Calle
            $inmueble->idioma_id = 1; // Default: Espanol
            $inmueble->idioma_id2 = 1; // Default: Espanol

            if ($request->image) {
                $filename = Imagen::generateImageName($request->image);
                $inmueble->id_portada = $filename;
            }else{
                $inmueble->id_portada = 'miniatura_inmueble.png';
            }   
            
            if ($inmueble->save()) {
                /* Saving the Property Image */
                if ($request->image) {
                    $imagen= new Imagen(); 
                    $imagen->saveImageFacade($request->image, $inmueble->id, $filename);
                }
            	/* Saving the Property Operation (Sail, Rent, Share) */
            	$modalidad = new Modalidad();
            	$modalidad->saveOperation($request, $inmueble->id);
                
                /* Detalles Inmueble */
                $interiores = new Interior();
                $interiores->inmueble_id = $inmueble->id;
                $interiores->aire_acondicionado = $request->aire_acondicionado;
                $interiores->calefaccion_int = $request->calefaccion_int;
                $interiores->amueblado = $request->amueblado;
                $interiores->cocina_equipada = $request->cocina_equipada;
                $interiores->horno = $request->horno;
                $interiores->microondas = $request->microondas;
                $interiores->nevera = $request->nevera;
                $interiores->internet = $request->internet;
                $interiores->wifi = $request->wifi;
                $interiores->lavadora = $request->lavadora;
                $interiores->mascotas = $request->mascotas;
                $interiores->television = $request->television;
                $interiores->piscina = $request->piscina;
                $interiores->salida_de_humos = $request->salida_de_humos;
                $interiores->save();

    			return ['message' => 'El inmueble ha sido guardado exitosamente.'];
    		}else{
    			return ['error' => 'Ha ocurrido un error al intentar guardar los datos del inmueble.'];
    		}

    	}
    }

    public function editFromPropietary($id){
        $inmueble = Inmueble::find($id);
        $inmueble->tipo;
        $inmueble->interiores;
        $title = 'Editar de Inmueble';
        return view('Homepage.propietaries.edit',compact('inmueble','title'));
    }

    public function updateFromPropietary(Request $request, $id){
        if ($request->ajax()) {
            /* Validation */
            $this->validate($request, $this->rules, $this->messages);
            /* Loading the Property Record */
            $inmueble = Inmueble::find($id);
            $inmueble->nombre = $request->nombre;
            $inmueble->tipo_id = $request->tipo_id;
            $inmueble->ciudad_id = $request->ciudad_id;
            $inmueble->codigo_postal = $request->codigo_postal;
            $inmueble->calle = $request->calle;
            $inmueble->numero = $request->numero;
            $inmueble->descripcion_corta = $request->descripcion_corta;
            $inmueble->usuario_id = Auth::user()->id;
            if ($request->image !== null) {
                $filename = Imagen::generateImageName($request->image);
                $inmueble->id_portada = $filename;
                /* Saving the Property Image */
                $imagen= new Imagen(); 
                $imagen->saveImageFacade($request->image, $inmueble->id, $filename);
            }

            if ($inmueble->save()) {

                /* Saving the Property Operation (Sail, Rent, Share) */
                $modalidad = Modalidad::where('inmueble_id',$id)->orderBy('id','ASC');
                $modalidad->delete();
                $modalidad = new Modalidad();
                $modalidad->saveOperation($request, $inmueble->id);

                /* Detalles Inmueble */
                $interiores = Interior::where('inmueble_id',$id)->orderBy('id','ASC');
                $interiores->delete();
                $interiores = new Interior();
                $interiores->saveInteriores($request, $inmueble->id);
                
                return ['message' => 'La información del inmueble ha sido actualizada exitosamente.'];
            }else{
                return ['error' => 'Ha ocurrido un error al intentar actualizar los datos del inmueble.'];
            }
        }
    }


    public function preferences(){
        $title = 'Preferencias del Propietario';
        $preferencias = Auth::user()->preferenciasPropietario->first();
        
        /* Initializing all preferences checkboxs as not checked */
        $preferenciasArray['tratar_profesionales'] = '';
        $preferenciasArray['tratar_demandantes'] = '';
        $preferenciasArray['precio_no_negociable'] = '';
        $preferenciasArray['imprescindible_aval'] = '';

        /* If there are previous preferences, the selecteds as true
        are passed to the preferenciasArray, next them will be
        used to mark the checkbox as chechek in the form */
        if (count($preferencias) > 0) {
            if ($preferencias->tratar_profesionales) {
                $preferenciasArray['tratar_profesionales'] = 'checked';
            }
            if ($preferencias->tratar_demandantes) {
                $preferenciasArray['tratar_demandantes'] = 'checked';
            }
            if ($preferencias->precio_no_negociable) {
                $preferenciasArray['precio_no_negociable'] = 'checked';
            }
            if ($preferencias->imprescindible_aval) {
                $preferenciasArray['imprescindible_aval'] = 'checked';
            }
        }
        
    	return view('Homepage.propietaries.preferences', compact('title','preferenciasArray'));
    }

    public function setPreferences(Request $request){
        if ($request->ajax()) {
            $user_id = Auth::user()->id;
            $ok = false;
            $existenPreferencias = PreferenciaPropietario::preferencesAlready($user_id);
            if($existenPreferencias>0){
                $preferencias = PreferenciaPropietario::find($existenPreferencias);
                $preferencias->fill($request->all());
                $preferencias->user_id = $user_id;

                if ($preferencias->save())  $ok = true ;
            }else{
                $preferencias = new PreferenciaPropietario();
                $preferencias->fill($request->all());
                $preferencias->user_id = $user_id;
                if ($preferencias->save())  $ok = true ;
            };

            if ($ok) {
                return json_encode(['message' => 'Se han guardado correctamente sus preferencias de compartir infromación relativa a sus inmuebles.']);
            }else{
                return json_encode(['message' => 'Ha ocurrido un error al intentar guardar sus preferencias.']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {   
        if ($request->ajax()) {
            $inmueble = Inmueble::find($id);
            if ($inmueble->delete()) {
                return [ 'message' => 'Se ha eliminado el registro del inmueble'];
            }else{
                return [ 'message' => 'Ha ocurrido un problema al intentar eliminar el registro del inmueble'];
            }
        };
    }

    
    
}