<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    protected $table = 'demandas';
    protected $fillable = ['cliente_id','inmueble_id','origen_demanda','comunicacion','tipo_demanda'];

    
    /**********************************************/
    /* MATCH DEMANDS */
    /* Properties demands that match an specific property  */

    public function matchDemands($inmueble){
        /*  
            If it was a demand by property we verified if it
            corresponds to the actual property
        */
        $this->extrademanda; // read demand extra data
        $this->cliente;
        $this->pais;
        return $this->getGemands($inmueble);
    }

    public function getGemands($inmueble){
        /* Demand by property */
        if ($this->inmueble_id == $inmueble->id) {
            return $this;
            //$parametrosDemanda  = $demanda->demandaBaseInmueble($demanda);
        }
        /* Demand by description */
        if ($demanda->inmueble_id == 0) {   
            return $this->demandByDescription($demanda, $inmueble);
        }
    }

    private function demandByDescription($demanda, $inmueble){
        /* 
            Demand by description, verified the responds of the 
            match between the demand params and property params.
        */
        if ($this->matchParams($demanda, $inmueble)) {
            return $demanda;
        }else{
            return [];
        }
    }

    /*
      Compare Test between the demand and the property.
       fields matched: tipo de inmueble, rango de superficie, 
       #banos, # habitaciones, pais, rango de precio de venta y/o alquiler
       returns 1 if matches 0 not match
      
      @return \Illuminate\Http\Response
    */
    private function matchParams($demanda, $inmueble){
        /* 
            Inicializamos en 1 para asumir que hay coincidencia. 
            Despues al recorrer el conjunto de demandas si no hay coincidencia
            para una demanda determinada se pasa a 0;
        */
        $coincide = 1; 
        $coincide = $this->coincidencia($demanda->tipo_inmueble_id, $inmueble->tipo_id, $coincide);
        $coincide = $this->rango($demanda->sup_desde, $demanda->sup_hasta, $inmueble->superficie,$coincide);
        $coincide = $this->coincidencia($demanda->banos, $inmueble->banos, $coincide);
        $coincide = $this->coincidencia($demanda->habitaciones, $inmueble->habitaciones, $coincide);
        $coincide = $this->coincidencia($demanda->pais_id, $inmueble->pais_id, $coincide);
        /* 
            Si se marca la opcion de venta, se comprueba si se ingreso algun rango 
            de valores, tanto para el precio en venta, como el precio en venta 
            por metro cuadrado 
        */
        if ($inmueble->modalidad->venta == 1) {
            if ($demanda->ventaprecio_desde > 0 || $demanda->ventaprecio_hasta >0) {
                $coincide = $this->rango($demanda->ventaprecio_desde, $demanda->ventaprecio_hasta, $inmueble->modalidad->ventaprecio,$coincide);
            }
            if ($demanda->ventaprecio_desde_m2 > 0  || $demanda->ventaprecio_hasta_m2 > 0 ) {
                $coincide = $this->rango($demanda->ventaprecio_desde_m2, $demanda->ventaprecio_hasta_m2, $inmueble->modalidad->ventaprecio2,$coincide);
            }
        }
        /* 
            Si se marca la opcion de alquiler residencial, se comprueba si se ingreso 
            algun rango de valores, tanto para el precio del alquiler, como el precio 
            del alquiler por metro cuadrado 
        */
        if ($inmueble->modalidad->alquiler_residencial == 1) {
            if ($demanda->alqres_precio_desde > 0 || $demanda->alqres_precio_hasta >0) {
                $coincide = $this->rango($demanda->alqres_precio_desde, $demanda->alqres_precio_hasta, $inmueble->modalidad->alqresprecio,$coincide);
            }
            if ($demanda->alqres_preciom2_desde > 0  || $demanda->alqres_preciom2_hasta > 0 ) {
                $coincide = $this->rango($demanda->alqres_preciom2_desde, $demanda->alqres_preciom2_hasta, $inmueble->modalidad->alqresprecio2,$coincide);
            }
        }
        return $coincide;
    }

    private function coincidencia($demanda, $existente, $coincide){
        /*
            Verifica la coincidencia para un parametro especifico -> $existente
        */
        if((($demanda == $existente) || ($demanda == 'Indiferente') || ($demanda == 0)) && $coincide == 1){
            return 1;
        } else {
            return 0;
        }
    }

    private function rango($min, $max, $existente,$coincide){
        /* 
            Funcion que devuelve 1 si una caracteristica de un inmueble se encuentra 
            en el rango de una demanda determinada, y 0 en caso contrario 
        */
        if(( (($existente >= $min) && ($existente <= $max)) || ($min == 0 && $max == 0) ) && $coincide == 1){
            return 1;
        } else {
            return 0;
        }
    }

    public function cliente(){
    	return $this->belongsTo('App\Cliente');
    }

    public function inmueble(){
    	return $this->belongsTo('App\Inmueble');
    }

    public function pais(){
        return $this->belongsTo('App\Pais');
    }

    public function extrademanda(){
    	return $this->hasOne('App\ExtrasDemanda');
    }

    public static function demandaBaseInmueble($demanda){
        $moneda = Demanda::moneda($demanda);
        $inmueble = $demanda->inmueble;
        $modalidad = $inmueble->modalidad;
        //Precio
        $cadena_precio = Demanda::precio($demanda,$modalidad,$moneda);
        // Superficie
        $cadena_superficie = Demanda::superficie($inmueble);
        // Habitaciones
        $hab = Demanda::habitaciones($inmueble);
        // Numero de Inmuebles
        $ninm = 1;
        // Zona
        $zona = $inmueble->zona;
        return [$cadena_precio,$cadena_superficie,$hab,$ninm,$zona];
    }

    private static function moneda($demanda){
        if ($demanda->inmueble->moneda == 'EUR - Euro') {
            return 'EUR';
        }else{
            return 'USD';
        }
    }

    private static function precio($demanda, $modalidad,$moneda){
        $preciomes = 0; $precioventa = 0;
        $cadena_precio = '';
        if ($modalidad->alquiler_residencial == 1) {
            $preciomes = $modalidad->alqresprecio;
            if ($preciomes > 0) {
                $cadena_precio = $preciomes.' '.$moneda.'/Mes';
            }
        } 
        if ($modalidad->venta == 1) {
            $precioventa = $modalidad->ventaprecio;
            if ($precioventa > 0) {
                if (strlen($cadena_precio) > 0) {
                    $cadena_precio = $cadena_precio.', '.$precioventa.' '.$moneda.'/Venta';
                }else{
                    $cadena_precio = $precioventa.' '.$moneda.'/Venta';
                }
            }
        }
        return $cadena_precio;
    }

    private static function superficie($inmueble){
        // Superficie
        if ($inmueble->superficie > 0) {
            return $inmueble->superficie.' m<sup>2</sup>';
        }else {
            return '-';
        }
    }

    private static function habitaciones($inmueble){
        if ($inmueble->habitaciones > 0) {
            return $inmueble->habitaciones;
        }
    }

    //private function demandByDescription($demanda, $inmueble){
        /* Determinamos si hay coincidencia para un conjunto de parametros */
       // $coincide = $this->matchParams($demanda, $inmueble);
        /* Finalmente si $coincide ==  1 hemos tenido coincidencia de la demanda
            con el inmueble actual del ciclo */
        /*if ($coincide == 1) {
            return $demanda;
        }*/
            /* Revisar */
            /*if ($demanda->ventaprecio_desde > 0 || $demanda->ventaprecio_hasta > 0) {
                if ($demanda->ventaprecio_desde <= $demanda->ventaprecio_hasta ) {
                    $cadena_precio = 'Desde '.$demanda->ventaprecio_desde.' '.$moneda.' a'.$demanda->ventaprecio_hasta.' '.$moneda.'/Venta';
                }
            }
            if ($demanda->alqres_precio_desde > 0 || $demanda->alqres_precio_hasta > 0) {
                if ($demanda->alqres_precio_desde <= $demanda->alqres_precio_hasta ) {
                    if (strlen($cadena_precio) > 0) {
                        $cadena_precio = $cadena_precio.', Desde '.$demanda->alqres_precio_desde.' '.$moneda.' a'.$demanda->alqres_precio_hasta.' '.$moneda.'/Mes';
                    }else{
                        $cadena_precio = 'Desde '.$demanda->alqres_precio_desde.' '.$moneda.' a'.$demanda->alqres_precio_hasta.' '.$moneda.'/Mes';
                    }
                }
            }*/
            // Superficie
            /*if ($demanda->sup_desde > 0) {
                $cadena_superficie = 'Desde '.$demanda->sup_desde.' m<sup>2</sup>';
            }
            if ($demanda->sup_hasta > 0) {
                $cadena_superficie = $cadena_superficie.' hasta '.$demanda->sup_hasta.' m<sup>2</sup>';
            }
            $superficies[$demanda->id] = $cadena_superficie;*/
    //}


}