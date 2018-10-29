<?php

namespace App\Http\Controllers\Buscador;

use App\Cliente;
use App\Inmueble;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AgenteInmuebleController extends Controller
{
    public function index(Request $request)
    {   

    	$busqueda=$request->buscadorGeneral;
    	
    	$inmuebles=Inmueble::where('inmuebles.active','=',1)
    				 ->leftjoin('tipos as t','inmuebles.tipo_id','=','t.id')
                     ->leftjoin('modalidades as m','inmuebles.id','=','m.inmueble_id')
                     ->leftjoin('categorias as cate','inmuebles.categoria_id','=','cate.id')
                     ->leftjoin('ciudades as ciu','inmuebles.ciudad_id','=','ciu.id')
                     ->leftjoin('paises as p','inmuebles.pais_id','=','p.id')
                     ->Where('inmuebles.nombre','LIKE',"%$busqueda%")
                     ->orWhere('t.nombre','LIKE',"%$busqueda%")
                     ->orWhere('cate.nombre','LIKE',"%$busqueda%")
                     ->orWhere('ciu.nombre','LIKE',"%$busqueda%")
                     ->orWhere('p.nombre','LIKE',"%$busqueda%")
                     ->orWhere('inmuebles.calle','LIKE',"%$busqueda%")
                     ->orWhere('inmuebles.estado','LIKE',"%$busqueda%")
                     ->orWhere('inmuebles.zona','LIKE',"%$busqueda%")
                     ->orWhere('inmuebles.calle','LIKE',"%$busqueda%")
                     ->orWhere('inmuebles.codigo_postal','LIKE',"%$busqueda%")
                     ->select('inmuebles.*')
                     ->get();
        
        /* Getting the property data through the relational model */
        $inmuebles->each(function($inmuebles){
            $inmuebles->imagenes;
            $inmuebles->pais;
            $inmuebles->getAgenceId();
        });
         /* Getting the number of Demands by Property */
        $demCoincidentes = [];
        foreach ($inmuebles as $inmueble) {
            $demCoincidentes[$inmueble->id] = $inmueble->getDemands();
        };

        $clientes = Cliente::where('usuario_id',Auth::user()->id)
                            
                            ->where(function ($query) use($busqueda) {
                                $query->leftjoin('vias as via','clientes.via_id','=','via.id')
                                ->leftjoin('municipios as muni','clientes.municipio_id','=','muni.id')
                                ->leftjoin('paises as p','clientes.pais_id','=','p.id')
                                // ->orWhere('via.nombre','LIKE',"%$busqueda%")
                                // ->orWhere('muni.nombre','LIKE',"%$busqueda%")
                                 //->orWhere('p.nombre','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.nombre','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.apellidos','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.alias','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.tipo_cliente','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.telefono','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.calle','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.visitas','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.presupuesto','LIKE',"%$busqueda%")
                                 ->orWhere('clientes.medio_contacto','LIKE',"%$busqueda%")->get();
                            })->get();

        $clientes->each(function($clientes){
                $clientes->inmuebles;
        });

        // Construimos la cadena de texto a mostrar en la tabla de clientes
        // Especificamente en el campo Ofertante (inmuebles del cliente)
        $string_modalidad = [];
        $string_temp = '';
        $contador_ventas = 0;
        $contador_alquiler = 0;
        $contador_otros = 0;
        $contador_oportunidad = 0;
        $j = 0;
        foreach ($clientes as $c) {
            foreach ($c->inmuebles as $i) {
                if ($i->modalidad->venta == 1) {   
                    $contador_ventas++; 
                }
                if ($i->modalidad->alquiler_residencial == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alquiler_vacacional == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_dia == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_semana == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_quincena == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_mes == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_temporada == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->alqvac_anno == 1) {
                    $contador_alquiler++;
                }
                if ($i->modalidad->opcion_compra == 1) {
                    $contador_oportunidad++;
                }
                if ($i->modalidad->traspaso == 1) {
                    $contador_oportunidad++;
                }
            }
            // Si el cliente tiene algun inmueble en venta ...
            if ($contador_ventas == 1) {
                $string_temp .= $contador_ventas." Venta";
            }elseif ($contador_ventas > 1) {
                 $string_temp .= $contador_ventas." Ventas";
            }
            if ($contador_alquiler > 0) {
                $string_temp = $this->coma($string_temp);
                $string_temp .= $contador_alquiler." Alquiler";
            }
            if ($contador_oportunidad == 1) {
                $string_temp = coma($string_temp);
                $string_temp .= "Oportunidad ".$contador_oportunidad;
            }elseif($contador_oportunidad > 1){
                $string_temp = $this->coma($string_temp);
                $string_temp = "Oportunidades ".$contador_oportunidad;
            }

            $string_modalidad[$c->id] =  $string_temp;
            $j++;
            $contador_ventas = 0;
            $contador_alquiler = 0;
            $contador_otros = 0;
            $contador_oportunidad = 0;
            $string_temp = '';
        }
        /* Getting the number of Demands by Property */
        return view('buscador.agente_inmueble', compact('inmuebles', 'demCoincidentes', 'clientes'));
        
    }
}
