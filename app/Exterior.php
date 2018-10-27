<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exterior extends Model
{
    protected $table = 'exteriores';
    protected $fillable = ['inmueble_id', 'balcones', 'vista_al_mar', 
    					   'jardin_privado', 'patio', 'piscina_ext', 'piscina_comunitaria', 
    					   'primera_linea_de_mar', 'terraza', 'vista_a_la_montana', 
    					   'zona_comunitaria', 'zona_deportiva', 'zona_infantil', 
    					   'solo_chicas', 'solo_chicos', 'solo_no_fumadores'];

    public function inmueble(){
    	return $this->belongsTo('App\Inmueble');
    }
}