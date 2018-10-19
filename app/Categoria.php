<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre'];

    public function inmuebles(){
    	return $this->hasMany('App\Inmueble');
    }
}
