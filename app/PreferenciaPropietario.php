<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferenciaPropietario extends Model
{
    protected $table = 'preferencias_propietarios';
    protected $fillable = ['user_id','tratar_profesionales','tratar_demandantes','precio_no_negociable','imprescindible_aval'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    /* Return true if the propietary user has stabliched his preferences */
    public static function preferencesAlready($user_id){
    	$existPreferences = PreferenciaPropietario::where('user_id','=',$user_id)->get();
    	if (count($existPreferences)>0){
    		return $existPreferences[0]->id;
    	}
    	return 0;
    }
}
