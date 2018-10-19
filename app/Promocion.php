<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';
    protected $fillable = ['user_id', 'nombre', 'tipo_promocion', 'constr', 'promotor',
    					   'comercializa', 'tipoVPO', 'fecha_entrega', 'anno_const',
    					   'cert_energ','fecha_alta','estado', 'pais_id', 'codigo_postal', 
    					   'municipio_id', 'via_id', 'calle', 'numero', 'piso', 'escalera',
    					   'puerta','mostrardireccion', 'zona','ascensor_prin',
    					   'ascensor_serv','domotica','parking_comu','parking_priv','piscina_priv',
    					   'trastero','zona_depor','zona_comu','zona_infa','energia_solar',
    					   'serv_porteria','alarma','montacargas','park_publico','suelo','ascensor',
    					   'ofloc_parking_privado','ofloc_servicio_porteria','ofloc_trastero',
    					   'ind_ascensor','muelles','ind_parking_publico','ind_parking_privado',
    					   'ind_montacargas','ind_trastero','obs_extras',
    					   'idioma_id', 'descripcion_corta', 'descripcion_extendida','slogan',
    					   'slogan_financiero','condiciones_economicas','memoria',
    					   'idioma_id2', 'descripcion_corta2', 'descripcion_extendida2','slogan2',
    					   'slogan_financiero2','condiciones_economicas2','memoria2','persona', 
    					   'mostrar_contacto','email_contacto','telefono_contacto','agencia','agente',
                           'cliente_propietario','medio_captacion','contrato','inicio_contrato','fin_contrato',
                           'inm_exclusiva','llaves','coment_llaves','notas_internas'];

    public function inmuebles(){
        return $this->hasMany('App\Inmueble');
    }

    public function imagenes(){
        return $this->hasMany('App\Promoimagen');
    }

    public function municipio(){
        return $this->belongsTo('App\Municipio');
    }

    public function pais(){
        return $this->belongsTo('App\Pais');
    }

    public function via(){
        return $this->belongsTo('App\Via');
    }

    public static function returnConstructionYear($promotion_id){
        $promocion = Promocion::find($promotion_id);
        return $promocion->anio_contruccion;
    }

}
    
            