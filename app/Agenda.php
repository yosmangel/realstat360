<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Agenda extends Model
{
    protected $table = "agenda";
    protected $fillable = ['user_id','inmueble_id','title','date','description'];

    public function inmueble(){
    	return $this->belongsTo('App\Inmueble');
    }

    // Events from the Blognote (Agenda)
    public static function getUserEvents(){
        return Agenda::where('user_id','=',Auth::user()->id)
                     ->where('active', '=',1)
                     ->get();
    }  

    
}
