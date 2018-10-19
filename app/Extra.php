<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $table='extras';
    protected $fillable = ['inmueble_id','calidades','estado_aseos','estado_banos',
    						'estado_cocina','estado_edificio','tipo_edificio','obs_calidades',
    						'altura','num_hab_dobles','num_hab_individuales','num_suites','sup_util',
    						'sup_cocina','sup_edificada','sup_salon','sup_terrazas','obs_superficies',
    						'num_armarios','carp_exterior','carp_interior','num_persianas',
    						'puerta_principal','puertas_interiores','ventanas','obs_carpinteria',
    						'acabados_paredes','paredes_banos','paredes_cocina','suelos','suelos_banos',
    						'suelos_cocina','techo','paredes','banneras','griferia','plato_duchas',
    						'sanitarios','obs_acabados','agua','gas','telefono','tvyfm','agua_caliente',
    						'cocina','electricidad','electrodomesticos','equipamientos','fontaneria','iluminacion',
    						'instalaciones','instalaciones_edificio','instalaciones_privadas',
    						'refrigeracion','interruptores','mecanismos','seguridad','tomasdeagua',
    						'obs_instalaciones','gastos_comunidad','calidad_precio','rentabilidad',
    						'obs_datoseconomicos','construccion','estilo_construccion','estructura',
    						'portalyescalera','puerta_entrada','obs_finca','calif_urbana','cercania_a',
    						'elementos_comunitarios','entorno','equipamientos_zonas','grado_urbanizacion',
    						'sol','transportes_publicos','vistas','distancia_poblacion','obs_situacion'];

    public function inmueble(){
    	return $this->hasOne('App\Extra');
    }
}
