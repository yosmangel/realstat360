<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['usuario_id','persorgz','calificativo','nombre','apellidos',
    'alias','fecha_nacimiento','estado_civil','tipo_doc','tipo_doc_num','idioma_id',
    'tipo_cliente','origen','fecha_alta','estado','telefono','telefono_de','movil',
    'movil_de','fax','fax_de','email','email_de','telefono2','telefono_de2','movil2',
    'movil_de2','fax2','fax_de2','email2','email_de2','web','pais_id','codigo_postal',
    'municipio_id','via_id','calle','numero','piso','escalera','puerta','tiporelacion',
    'calificativo_otrocont','nombre_otrocont','ape_otrocont','tel_otrocont',
    'tel_otrocont_de','mov_otrocont','mov_otrocont_de','fax_otrocont','fax_otrocont_de',
    'email_otrocont','email_otrocont_de','tel_otrocont2','tel_otrocont_de2','mov_otrocont2',
    'mov_otrocont_de2','fax_otrocont2','fax_otrocont_de2','email_otrocont2',
    'email_otrocont_de2','fecha_nac_otrocon','estado_civil_otrocon','tipo_doc_otrocon',
    'tipo_doc_num_otrocon','idioma_otrocon','pais_otrocont','codigo_postalotrocont',
    'municipio_idotrocont','via_idotrocont','calle_otrocont','numero_otrocont','piso_otrocont',
    'escalera_otrocont','puerta_otrocont','comentarios'];

    public function usuario(){
    	return $this->belongsTo('App\User');
    }

	public function pais(){
    	return $this->belongsTo('App\Pais');
    }

    public function municipio(){
    	return $this->belongsTo('App\Municipio');
    }

    public function via(){
    	return $this->belongsTo('App\Via');
    }

    public function inmuebles(){
        return $this->hasMany('App\Inmueble');
    }
    
    public function demandas(){
        return $this->hasMany('App\Demanda');
    }

}
