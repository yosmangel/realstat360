<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table='entidades';
    protected $fillable = ['nombre'];

    public function inmuebles(){
    	return $this->hasMany('App\Inmueble');
    }
}
