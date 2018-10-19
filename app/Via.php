<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Via extends Model
{
    protected $table = 'vias';
    protected $fillable = ['nombre'];

    public function inmuebles(){
    	return $this->hasMany('App\Inmueble');
    }
}
