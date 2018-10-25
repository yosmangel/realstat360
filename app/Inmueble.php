<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agencia;
use App\Promotion;
use Auth;
use Carbon\Carbon;

class Inmueble extends Model
{
    protected $fillable = [
    						'id', 
    						'categoria_id',
    						'tipo_id',
    						'obranueva',
                            'promocion_id',
    						'adjbancaria',
                            'fecha_alta',
                            'estado',
                            'periodicidad',
    						'entidad_id', 
    						'agencia_id',
    						'usuario_id',
    						'nombre',
    						'superficie', 
                            'superficie_solar',
                            'ocultarsuperficie',
    						'zona',
    						'provincia_id',
    						'codigo_postal',
    						'ciudad_id',
    						'pais_id',
                            'via_id',
                            'calle',
                            'numero',
                            'piso',
                            'escalera',
                            'puerta',
                            'mostrardireccion',
    						'maps',
    						'moneda',
                            'idioma_id',
                            'descripcion_corta',
                            'descripcion_extendida',
                            'idioma_id2',
                            'descripcion_corta2',
                            'descripcion_extendida2',
                            'mostrar_contacto',
    						'precio_total',
    						'tasa_precio_total',
    						'precio_por_metro',
    						'tasa_precio_por_metro',
    						'mostrar_precio',
    						'adjudicado',
    						'num_registro_turismo',
    						'anio_contruccion',
    						'conservacion',
    						'orientacion',
                            'tiponave',
    						'agua_caliente',
                            'num_despachos',
                            'obs_datos',
                            'extras_basicos',
    						'calefaccion',
    						'certificado_energetico',
    						'habitaciones',
    						'banos',
    						'camas',
    						'image',
    						'publication_type',
    						'precio_negociable',
    						'imprescindible_aval',
    						'active',
                            'url',
                            'anio_contruccion',
                            'id_portada',
                            'persona'
    						];

    protected $agencia_id;
    /**********************************************/
    /* Getting the Agence Id  */
    public function getAgenceId(){
        $agencia = Agencia::where('user_id',Auth::user()->id)->get();
        if (count($agencia) > 0) {
            return $agencia[0]->id;
        }else{
            return 0;
        }
    }

    /***********************************************/
    /* Getting the construction year by the Promotion information */
    public function getConstructionYear($itsNew, $promotion_id){
        if ($itsNew) {
            if ($promotion_id !== 0) {
                return $this->getYearFromPromotion($promotion_id);
            }else{
                return '-';
            }
        }
    }

    public function getYearFromPromotion($promotion_id){
        // Returns the Year of Construction of the Promotion
        return Promocion::returnConstructionYear($promotion_id);
    }

    /**********************************************/
    /* PROPERTY FRONT IMAGE */
    // Returns the filename of the property image selected to be shown as principal
    
    public function getPropertyFrontImage(){
        if ($this->id_portada !== null) {
            // Return the selected image
            return $this->getShossenImage();
        }else{
            // If there are not a selected image the first image of the property is returned
            return $this->getFirstImage();
        }
    }

    private function getShossenImage(){
        // Return the shossen image
        return $this->imagenes[$this->id_portada]->nombre;
    }

    private function getFirstImage(){
        if ( count($this->imagenes) > 0 ) {
        // Return the first image of the property
            return $this->imagenes[0]->nombre;
        }else{
        // If there are not images of the property
            return '';
        }
    }
    /**********************************************/

    /**********************************************/
    /* RELATIONAL FUNCTIONS */

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function tipo(){
        return $this->belongsTo('App\Tipo');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function municipio(){
        return $this->belongsTo('App\Municipio');
    }

    public function ciudad(){
        return $this->belongsTo('App\Ciudad');
    }

    public function pais(){
        return $this->belongsTo('App\Pais');
    }

    public function via(){
        return $this->belongsTo('App\Via');
    }

    public function interno(){
        return $this->hasOne('App\Interno');
    }

    public function interiores(){
        return $this->hasOne('App\Interior');
    }

    public function exteriores(){
        return $this->hasOne('App\Exterior');
    }

    public function finca(){
        return $this->hasOne('App\Finca');
    }

    public function promocion(){
        return $this->belongsTo('App\Promocion');
    }

    public function entidad(){
        return $this->belongsTo('App\Entidad');
    }

    public function modalidad(){
        return $this->hasOne('App\Modalidad');
    }

    public function extra(){
        return $this->hasOne('App\Extra');
    }

    public function imagenes(){
        return $this->hasMany('App\Imagen')->orderBy('id','DES');
    }

    public function idioma(){
        return $this->belongsTo('App\Idioma');
    }

    public function imagenPortada(){
        return $this->hasMany('App\Imagen')->where('portada',1);
    }

    public function archivos(){
        return $this->hasMany('App\Archivo')->orderBy('id','DES');
    }

    public function demandas(){
        return $this->hasMany('App\Demanda');
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario')->orderBy('id','ASC');
    }

    public function agendas(){
        return $this->hasMany('App\Agenda')->where('active','=',1);
    }
    /**********************************************/

    public static function findWithRelations($id){
        $inmueble = Inmueble::find($id);
        $inmueble->tipo;
        $inmueble->ciudad;
        $inmueble->pais;
        $inmueble->provincia;
        $inmueble->idioma;
        $inmueble->modalidad;
        $inmueble->imagenes;

        return $inmueble;
    }

    public function getDemands(){
        /*
            This method return the list of demands for an specific property
        */
        $lista_demandas = [];

        // First we obtain the demans that match the property type
        $demandas = Demanda::where('tipo_inmueble_id','=',$this->tipo->id)->get();
        
        // If there are demands that match the property type the next step is 
        // verified the match in other properties params, 
        // we use the matchDemands method of the Demand model
        if (count($demandas) > 0) {
            foreach ($demandas as $demanda) {
                $lista_demandas[] = $demanda->matchDemands($this);
            }
            // Finally we return the list of demands that match the requirements
            return $lista_demandas;
        }
        else{
            return [];
        }
    }

    //Scope Search Local
    public function scopeSearch( $query ,$key){

        return $query->join('tipos as t','inmuebles.tipo_id','=','t.id')
                     ->join('modalidades as m','inmuebles.id','=','m.inmueble_id')
                     ->join('categorias as cate','inmuebles.categoria_id','=','cate.id')
                     ->join('ciudades as ciu','inmuebles.ciudad_id','=','ciu.id')
                     ->join('paises as p','inmuebles.pais_id','=','p.id')
                     ->Where('inmuebles.nombre','LIKE',"%$key%")
                     ->orWhere('t.nombre','LIKE',"%$key%")
                     ->orWhere('cate.nombre','LIKE',"%$key%")
                     ->orWhere('ciu.nombre','LIKE',"%$key%")
                     ->orWhere('p.nombre','LIKE',"%$key%")
                     ->orWhere('inmuebles.calle','LIKE',"%$key%")
                     ->orWhere('inmuebles.estado','LIKE',"%$key%")
                     ->orWhere('inmuebles.zona','LIKE',"%$key%")
                     ->orWhere('inmuebles.calle','LIKE',"%$key%")
                     ->orWhere('inmuebles.codigo_postal','LIKE',"%$key%");
    }

     public static function getProperties($id = null){
        /* 
          Returning all properties and their relations 
          for the authenticated user 
        */
        if ($id == null) {
            $inmuebles = Inmueble::where('usuario_id',Auth::user()->id)->get();
            $inmuebles->each(function($inmuebles){
                $inmuebles->tipo;
                $inmuebles->ciudad;
                $inmuebles->imagenPortada;
                $inmuebles->modalidad;
            });

            return $inmuebles;
        }
        
        /* 
          Returning an specific property and its relations 
        */
        $inmueble = Inmueble::find($id);
        $inmueble->type;
        $inmueble->city;
        /*$inmueble->images;*/
        return $inmueble;
    }

    public static function getUserProperties(){
        return Inmueble::where('usuario_id','=',Auth::user()->id)->get();
    }   

    /*public function getCreatedAtAttribute($this->created_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($this->created_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d');
    }*/


}
