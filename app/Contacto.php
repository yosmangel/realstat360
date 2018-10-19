<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contactos';

    protected $fillable = ['user_id', 'propietario_id', 'inmueble_id', 'mensaje', 'flag'];


    public function inmueble(){
        return $this->belongsTo('App\Inmueble');
    }

     //Scope Search Local
    public function scopecontactsByProperty($query, $user_id){
        return $query->join('inmuebles as i','contactos.inmueble_id', '=', 'i.id')
                     ->where('contactos.propietario_id','=',$user_id);
    }
}
