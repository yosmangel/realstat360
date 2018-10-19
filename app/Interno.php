<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interno extends Model
{
    protected $table = 'internos';
    protected $fillable = ['inmueble_id','agencia_id','agente_id','contrato_firmado','ini_contrato','fin_contrato',
    						'cliente_prop_id','alqres_precio_pub','alqres_precio_prop','honorarios','en_exclusica',
    						'ubicacion_llaves','comment_llaves','reg_num','reg_tomo','reg_libro','reg_folio',
    						'reg_finca','reg_registrode','reg_desregistral','reg_catastral','notas_int'];

    public function inmueble(){
        return $this->belongsTo('App\Inmueble');
    }

}
