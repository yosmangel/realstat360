<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Imagen;
use App\Inmueble;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Si form_type = 0 se ha enviado el formulario de imagenes del Inmueble
        if ($request->form_type == 0) {
            
            $dir = 'files_img/';
            $files = $request->file('file');
            foreach ($files as $file) {
                // Subida del archivo al server
                $in_extension = $file->getClientOriginalExtension();
                $nombreFichero = "inmueble_".time().rand(1,100).".".$in_extension;
                $file->move($dir, $nombreFichero);
                
                // Se guarda la informacion de la imagen en la base de datos
                $imagen = new Imagen();
                $imagen->inmueble_id = $request->inmueble_id;
                $imagen->nombre = $nombreFichero;
                $imagen->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idimagen,$idinmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $imagen = Imagen::find($id);

        // Se elimina el registro del archivo de la base de datos
        if ($imagen->delete()) {
            // Si el registro se elimina de la base de datos tambien se elimina el archivo del servidor
            $dir = 'files_img/';
            unlink($dir.$imagen->nombre);
        };


        $message = 'Se ha eliminado la imagen del inmueble REF: ';
        if ($request->ajax()) {
            return $message;
        };
    }

    public function descargar($imagen){
        $pathtoFile = public_path().'//files_img/'.$imagen;
        return response()->download($pathtoFile);
    }
}
