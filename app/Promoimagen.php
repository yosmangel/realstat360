<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promoimagen extends Model
{
    protected $table = 'imgpromos';
    protected $fillable = ['promocion_id','nombre'];

    public function promocion(){
    	return $this->belongsTo('App\Promocion');
    }
}
