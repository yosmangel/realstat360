<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Agencia extends Model
{
    protected $table = 'agencias';
    protected $fillable = ['user_id','nombre','tipo_p1','tipo_p2','tipo_sociedad','razon_social','telefono','telefono_de','movil','movil_de','fax','fax_de','email','email_de','web','pais_id','codigo_postal','municipio_id','via_id','calle','numero','piso','escalera','puerta','notas'];


    // Relaciones
    public function agentes(){
    	return $this->hasMany('App\Agente');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public static function getAgencyId(){
        return Agencia::where('user_id','=',Auth::user()->id); 
    }
}
