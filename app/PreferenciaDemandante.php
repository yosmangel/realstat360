<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferenciaDemandante extends Model
{
    protected $table = 'preferencias_demandante';
    protected $fillable = ['user_id','tratar_solo_propietarios','compra','arrienda'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    /* Return true if the demand user has stabliched his preferences */
    public static function preferencesAlready($user_id){
    	$existPreferences = PreferenciaDemandante::where('user_id','=',$user_id)->get();
    	if (count($existPreferences)>0){
    		return $existPreferences[0]->id;
    	}
    	return 0;
    }
}