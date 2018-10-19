<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Promoimagen;

class PromoimagenesController extends Controller
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
            
            $dir = 'promo_files_img/';
            $files = $request->file('file');
            foreach ($files as $file) {
                // Subida del archivo al server
                $in_extension = $file->getClientOriginalExtension();
                $nombreFichero = "imgpromo_".time().rand(1,100).".".$in_extension;
                $file->move($dir, $nombreFichero);
                
                // Se guarda la informacion de la imagen en la base de datos
                $imgpromo = new Promoimagen();
                $imgpromo->promocion_id = $request->promocion_id;
                $imgpromo->nombre = $nombreFichero;
                $imgpromo->save();
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
