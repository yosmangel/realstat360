<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    protected $destinationPath = 'img/avatars/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'lastname','telephone','password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Relaciones */
    // Relacion 1 a muchos: 1 user -> varias agencias
    public function agencias(){
        return $this->hasMany('App\Agencia');
    }

    public function preferenciasDemandante(){
        return $this->hasMany('App\PreferenciaDemandante');
    }

    public function preferenciasPropietario(){
        return $this->hasMany('App\PreferenciaPropietario');
    }

    /* Verificar si el usuario autenticado es administrador */
    public function admin(){
        return $this->user_type == 25;
    }

    /* Verificar si el usuario autenticado es administrador */
    public function email(){
        return $this->email;
    }

    /* Verificar si el usuario autenticado es profesional */
    public function profesional(){
        return $this->user_type == 1;
    }

    /* Verificar si el usuario autenticado es propietario */
    public function propietario(){
        return $this->user_type == 0;
    }

    /* Verificar si el usuario autenticado es demanda */
    public function demanda(){
        return $this->user_type == 2;
    }


    /* SAVE USER AVATAR */
    public function saveAvatar($file){
        $filename = $this->generateImageName($file);
        return $this->saveImageIfExist($file, $filename);
    }

    private function saveImageIfExist($file, $filename){
         if (isset($file))
            {
                /* 
                    Save the image file in disk and return the name 
                */
                return $this->saveInDisk($file, $filename);
            }else{
                /* 
                    If the user do not upload the image file,
                    the existing image name in the database 
                    it's returned, in case this filed is empty, 
                    the default image name it's returned.
                */
                return $this->ifPreviousSaved();
            }
    }

    public static function generateImageName($file){
        $in_extension = $file->getClientOriginalExtension();
        return "avatar_".time().rand(1,100).".".$in_extension;
    }

    private function saveInDisk($file, $filename){
        /* Saving the image in disk */
        $file->move($this->destinationPath, $filename);
        return $filename;
    }

    private function ifPreviousSaved(){
        /*
            If we are creating the property it returns the default image filename.
        */
        if($this->avatar == '' || $this->avatar == null){
            return 'user.png';
        }
        /* 
            If there exist a previous image, it returns the filename.
        */
        return $this->avatar;
    }
   
}
