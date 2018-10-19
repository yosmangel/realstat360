<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class DemandaRapida extends Model
{
    protected $table = 'demanda_rapida';
    protected $fillable = [
    						'descripcion', 'tipo', 'inmuebleen', 'provincia', 'ciudad', 
    						'name', 'lastname', 'telephone', 'email',
    						'categoria_id',  'obranueva','comunicacion',
    						'adjudicacion', 'sup_desde', 'sup_hasta', 'venta', 'ventaprecio_desde', 
    						'ventaprecio_hasta', 'ventaprecio_desde_m2', 'ventaprecio_hasta_m2', 
    						'alquiler_residencial', 'alqres_precio_desde', 'alqres_precio_hasta', 
    						'alqres_preciom2_desde', 'alqres_preciom2_hasta', 'opcioncompra', 
    						'moneda', 'banos', 'habitaciones', 
    						'via_id', 'calle', 'zona', 'notas'];

    /* 
        Devuelve los inmuebles coincidentes con la demanda que se haya enviado 
        en la Busqueda Rapida desde el Homepage, requiere el email del usuario
        que haya realizado la busqueda ya que se toma la descripcion de la 
        tabla de demandas para generar la busqueda a partir de las palabras
        claves.
    */
    public static function getProperties($email){
        /* Obtenemos todas las demandas del usuario autenticado */ 
        $demands = DemandaRapida::where('email','=',$email)->get();
        $allLocals = [];
        /* Recorremos la lista de demandas encotradas del usuario */
        foreach ($demands as $demand) {
            /* 
                Obtenemos la descripcion de la demanda que escribio el usuario
                al realizar la busqueda. La convertimos en un array para usar 
                las palabras de la descripcion como palabras claves en la busqueda
             */
            $keys_demands = explode(' ', $demand->descripcion);

            /* Recorremos cada una de las palabras de la busqueda */
            foreach ($keys_demands as $keyword) {
                /* La siguiente funcion  findLocals devolvera los
                    inmuebles que coincidan con las palabras claves
                    de la lista.
                */
                $allLocals = DemandaRapida::getPropertiesByKeyword($keyword);
            }
        }
        /* Devolvemos el array de los inmuebles encontrados
        habiendo eliminado los inmuebles repetidos, ya que dos 
        palabras claves pueden haber arrojado un mismo inmueble */
        return unique_multidim_array($allLocals,'id');

    }

    /*
        Obtenemos los inmuebles correspondientes a cada palabra clave.
    */
    private static function getPropertiesByKeyword($keyword){
        $locals = [];
        
        /* Solo se consideran las palabras claves con mas de 3 caracteres */
        if (strlen($keyword) > 3) {
            
            /* Se obtienen los locales correspondientes a la palabra clave */
            $query = Inmueble::search($keyword)->orderBy('inmuebles.id','DESC')->get();
            
            /* Se convierte el resultado en un array para poder despues 
            eliminar los repetidos */
            foreach ($query as $q) {
                $locals[] = $q; 
            }
        }
        return $locals;
    }

}