<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $fillable = ['nombre','provincia_id'];

    public function inmuebles(){
        return $this->hasMany('App\Inmueble');
    }

}
