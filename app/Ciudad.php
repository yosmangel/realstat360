<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';
    protected $fillable = ['provincia_id','nombre'];

    public function inmuebles(){
        return $this->hasMany('App\Inmueble');
    }
}
