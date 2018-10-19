<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    protected $table = 'finca';
    protected $fillable = ['inmueble_id', 'ascensor', 'conserje', 'energia_solar', 'garage_privado', 'parking_comunitario', 'trastero','video_portero'];

    public function inmueble(){
    	return $this->belongsTo('App\Inmueble');
    }


}