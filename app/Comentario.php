<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $fillable = ['inmueble_id','interesado_id','propietario_id','respuesta','comentario'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
