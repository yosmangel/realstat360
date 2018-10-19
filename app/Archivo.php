<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'archivos';
    protected $fillable = ['inmueble_id','nombre'];

    public function inmueble(){
    	return $this->belongsTo('App\Inmueble');
    }
}
