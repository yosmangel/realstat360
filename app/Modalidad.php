<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = 'modalidades';
    protected $fillable = ['inmueble_id','venta','ventaprecio','ventaprecio2','alquiler_residencial',
    						'alqresprecio','alqresprecio2','traspaso','traspasoprecio','traspasoprecio2',
    						'compartir','periodicidad','compartirprecio','compartirprecio2',
    						'alquiler_vacacional','alqvac_dia','alqvac_dia_p','alqvac_dia_pm2',
							'alqvac_semana','alqvac_semana_p','alqvac_semana_pm2','alqvac_quincena',
							'alqvac_quincena_p','alqvac_quincena_pm2','alqvac_mes','alqvac_mes_p',
							'alqvac_mes_pm2','alqvac_temporada','alqvac_temporada_p','alqvac_temporada_pm2',
							'alqvac_anno','alqvac_anno_p','alqvac_anno_pm2'];

    public function inmueble(){
        return $this->belongsTo('App\Inmueble');
    }
	
    public function saveOperation($request, $inmueble_id){
        $this->inmueble_id = $inmueble_id;
        $this->fill($request->all());
        $this->ventaprecio = doubleval($request->ventaprecio);
        $this->alqresprecio = doubleval($request->alqresprecio);
        /*$this->compartirprecio = doubleval($request->compartirprecio);*/
        $this->save();
    }

}
