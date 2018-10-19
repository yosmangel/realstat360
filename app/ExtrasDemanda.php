<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtrasDemanda extends Model
{
	protected $table = 'extrasdemandas';
 	protected $fillable = ['demanda_id', 'calidades', 'estado_aseos', 'estado_banos', 
 							'estado_cocina', 'estado_edificio', 'tipo_edificio', 
 							'obs_calidades', 'altura_desde', 'altura_hasta', 'hab2_desde', 
 							'hab2_hasta', 'hab1_desde', 'hab1_hasta', 'suites_desde', 
 							'suites_hasta', 'suputil_desde', 'suputil_hasta', 
 							'supsalon_desde', 'supsalon_hasta', 'supcoci_desde', 
 							'supcoci_hasta', 'supedif_desde', 'supedif_hasta', 
 							'supterr_desde', 'supterr_hasta', 'obs_superficies', 
 							'num_armarios', 'carp_exterior', 'carp_interior', 'persianas', 
 							'puerta_principal', 'puertas_interiores', 'ventanas', 
 							'obs_carpinteria', 'acabados_paredes', 'paredes_banos',
 							'paredes_cocina', 'suelos', 'suelos_banos', 'suelos_cocina', 
 							'techo', 'paredes', 'banneras', 'griferia', 'plato_duchas', 
 							'sanitarios', 'obs_acabados', 'agua', 'gas', 'telefono', 'tvyfm', 
 							'agua_caliente', 'cocina', 'electricidad', 'electrodomesticos', 
 							'equipamientos', 'fontaneria', 'iluminacion', 'instalaciones',
 							'instalaciones_edificio', 'instalaciones_privadas', 
 							'refrigeracion', 'interruptores', 'mecanismos', 'seguridad', 
 							'tomasdeagua', 'obs_instalaciones', 'gastoscom_desde', 
 							'gastoscom_hasta', 'calidad_precio', 'rentabilidad', 
 							'obs_datoseconomicos', 'construccion', 'estilo_construccion', 
 							'estructura', 'portalyescalera', 'puerta_entrada', 'numfach_desde', 
 							'numfach_hasta', 'obs_finca', 'calif_urbana', 'cercania_a', 
 							'elementos_comunitarios', 'entorno', 'equipamientos_zonas', 
 							'grado_urbanizacion', 'sol', 'transportes_publicos', 'vistas', 
 							'distancia_poblacion', 'obs_situacion', 'url'];	
 	
 	public function demanda(){
    	return $this->belongsTo('App\Demanda');
 	}
}
