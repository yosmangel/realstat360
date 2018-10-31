<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class UserController extends Controller
{
    /* Validation Arrays */
    private $messages = [
                'password.confirmed'           =>'Las contraseñas no coinciden.',
                'name.required'         => 'Escriba su nombre.',
            ]; 
    private $rules = [
                'password' => 'confirmed',
                'name' => 'required'
            ];
    
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
        //
    }

    /**
     * Display the specified resource from the Professional Panel
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.profile',compact('user'));
    }

    /**
     * Display the specified resource from the Propietaries Panel
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfileForm()
    {
        $user = Auth::user();
        $title = 'Perfil de Usuario';
        return view('Homepage.users.profile',compact('user','title'));
    }

    public function updateProfile(Request $request, $id){
        if ($request->ajax()) {
            $this->validate($request, $this->rules, $this->messages);
            $profile = User::find($id);
            $profile->name = $request->name;
            $profile->lastname = $request->lastname;
            $profile->telephone = $request->telephone;
            if ($request->password !== '' && $request->password !== null) {
                $profile->password = bcrypt($request->password);
            }
            if ($request->avatar) {
                $profile->avatar = $profile->saveAvatar($request->avatar);
            }
            if ($profile->update()) {
                return ['message' => 'Se han actualizado los datos del usuario'];
            }else{
                return ['message' => 'Ha ocurrido un error al ntentar actualizar sus datos personales'];
            }
        }
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
        if ($request->ajax()) {

            $profile = User::find($id);
            $messages = [
                'nombre.required'       => 'Debe ingresar el nombre del usuario.',
                'nombre.min'            => 'El nombre del usuario debe tener al menos 3 carácteres.',
                'lastname.required'    =>'Debe ingresar los apellidos del usuario.',
                'lastname.min'         => 'El apellido del usuario debe tener al menos 3 carácteres.',
                'password' =>'La contraseña debe ser mayor a 8 dígitos.',
                'password.confirmed'  =>'La confirmación de la contraseña debe ser igual a la contraseña.',
                
                
            ];
            $this->validate($request,[
                'nombre'        => 'required|min:3',
                'lastname'     => 'required|min:3',
                'password'  => 'min:8|confirmed'
                ],$messages);

            $profile->name = $request->nombre;
            $profile->lastname = $request->lastname;
            $profile->address= $request->address;

            if ($request->password != '' && $request->password != null) {
                $profile->password = bcrypt($request->password);
            }

            if ($profile->update()) {
                return ['message' => 'Se han actualizado los datos del usuario'];
            }else{
                return ['message' => 'Ha ocurrido un error al ntentar actualizar sus datos personales'];
            }
        }
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
