<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Archivo;

class ArchivosController extends Controller
{
    
	public function index(){
		return redirect()->route('home');
		//return view('archivos.formulario');
	}

    public function store(Request $request){

    	// Si form_type = 1 se ha enviado el formulario de documentos del Inmueble
    	if ($request->form_type == 1) {
	    	$dir = 'files/';
	    	$files = $request->file('file');
	    	foreach ($files as $file) {
    			// Subida del archivo al server
	    		$nombreFichero = $file->getClientOriginalName();
	    		$file->move($dir, $nombreFichero);

	    		// Se guarda la informacion de la imagen en la base de datos
	            $archivo = new Archivo();
	            $archivo->inmueble_id = $request->inmueble_id;
	            $archivo->nombre = $nombreFichero;
	            $archivo->save();
	    	};
    	}

    	// Guardamos la informacion del archivo en a base de datos



    }
    public function create()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id, Request $request)
    {
        $archivo = Archivo::find($id);

        // Se elimina el registro del archivo de la base de datos
        if ($archivo->delete()) {
            // Si el registro se elimina de la base de datos tambien se elimina el archivo del servidor
            $dir = 'files/';
            unlink($dir.$archivo->nombre);
        };

        $message = 'Se ha eliminado el archivo seleccionado';
        if ($request->ajax()) {
            return $message;
        };
    }

}
