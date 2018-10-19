<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
	protected $table = 'agentes';
	protected $fillable = ['nombre','apellidos','avatar','idioma_id','color',
						   'acceso','rol','horario','tratamiento','clientes_permitidos',
						   'acciones_permitidas','inmuebles_permitidos','telefono',
						   'movil','fax','email','agencia_id','departamento','cargo',
						   'estado','fecha_alta','notas']; 

	public function agencia(){
		return $this->belongsTo('App\Agencia');
	} 

	public function idioma(){
		return $this->belongsTo('App\Idioma');
	}
}
