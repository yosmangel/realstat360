<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interior extends Model
{
    protected $table = 'interiores';
    protected $fillable = ['inmueble_id', 'aire_acondicionado', 'armarios', 
    					   'cocina_equipada', 'cocina_office', 'amueblado', 
    					   'calefaccion_int', 'electrodomesticos', 'horno', 'wifi', 
    					   'internet', 'lavadero', 'lavadora', 'microondas', 
    					   'nevera', 'no_amueblado', 'parquet', 'puerta_blindada', 
    					   'mascotas', 'suite_con_bano', 'television', 'sauna', 
    					   'piscina', 'salida_de_humos'];

   	public function inmueble(){
   		return $this->belongsTo('App\Inmueble'); 
	   }
	   
	public function saveInteriores($request, $inmueble_id){
        $this->inmueble_id = $inmueble_id;
        $this->fill($request->all());
        $this->save();
    }
   	
}
            
