<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['inmueble_id','nombre','portada'];

    protected $destinationPath = 'files_img/';

    public function inmueble(){
    	return $this->belongsTo('App\Inmueble');
    }

    /*
        Save the property image from the Propietaries User
    */
    public function saveImageFacade($file, $inmueble_id, $filename){
        $this->saveImageIfExist($file, $filename);
        $this->saveInDataBase($filename,$inmueble_id);
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
                    If the user do not upload the file,
                    when creating or editing the property,
                    the existing image name in the database 
                    it's returned, in case this filed is empty, 
                    the default image name it's returned.
                */
                return $this->ifPreviousSaved();
            }
    }

    public static function generateImageName($file){
        $in_extension = $file->getClientOriginalExtension();
        return "inmueble_".time().rand(1,100).".".$in_extension;
    }

    private function saveInDisk($file, $filename){
        //$filename = $this->generateImageName($file);
        /* Saving the image in disk */
        $file->move($this->destinationPath, $filename);
        
        return $filename;
    }

    private function saveInDataBase($filename, $inmueble_id){
        $this->inmueble_id = $inmueble_id;
        $this->nombre = $filename;
        $this->portada = 1;
        $this->save();
    }

    private function ifPreviousSaved(){
        /*
            If we are creating the property it returns the default image filename.
        */
        if($this->nombre == ''){
            return 'miniatura_inmueble.png';
        }
        /* 
            If there exist a previous image, it returns the filename.
        */
        return $this->nombre;
    }

}
