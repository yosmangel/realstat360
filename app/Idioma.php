<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = 'idiomas';
    protected $fillable = ['nombre'];

    public function inmuebles(){
    	$this->hasMany('App\Inmueble');
    }
}
