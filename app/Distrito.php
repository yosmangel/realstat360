<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';
    protected $fillable = ['nombre','distrito_id'];

    public function inmuebles(){
        return $this->hasMany('App\Inmueble');
    }
}
