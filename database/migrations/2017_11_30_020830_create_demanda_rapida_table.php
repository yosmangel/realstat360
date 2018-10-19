<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandaRapidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * Tabla de Demanda Rapida.
     * Almacena la demanda de un usuario que realiza una busqueda sin estr registrado aun en el sistema
     */
    public function up()
    {
        Schema::create('demanda_rapida', function (Blueprint $table) {
            $table->increments('id');
            
            /*
              Datos de la Busqueda
            */
            // Tipo de Inmueble
            $table->integer('tipo')->unsigned();
            $table->foreign('tipo')
                  ->references('id')
                  ->on('tipos')
                  ->onDelete('cascade');
            $table->enum('inmuebleen', ['Venta', 'Alquiler Residencial', 'Alquiler Vacacional','Traspaso', 'Compartir']);

            // Descripcion de lo que busca el usuario
            $table->text('descripcion');

            // Clave Foranea del Provincias
            $table->integer('provincia')->unsigned();
            $table->foreign('provincia')
                  ->references('id')
                  ->on('provincias')
                  ->onDelete('cascade');
            // Clave Foranea de las Ciudades
            $table->integer('ciudad')->unsigned();
            $table->foreign('ciudad')
                  ->references('id')
                  ->on('ciudades')
                  ->onDelete('cascade');
            
            /*
              Datos del Usuario
            */
            $table->string('name');
            $table->string('lastname');
            $table->string('telephone');
            $table->string('email');

            /*
              Datos Complementarios
            */
            $table->enum('comunicacion',['Email','Llamada','Oficina'])->default('Email');
            $table->integer('categoria_id')->default(1);
            $table->enum('obranueva',['Si','No','Indiferente'])->default('Indiferente'); 
            $table->enum('adjudicacion',['Si','No','Indiferente'])->default('Indiferente'); 
            $table->double('sup_desde')->default(0); 
            $table->double('sup_hasta')->default(0); 
            $table->boolean('venta')->default(false);
            $table->double('ventaprecio_desde')->default(0); 
            $table->double('ventaprecio_hasta')->default(0); 
            $table->double('ventaprecio_desde_m2')->default(0); 
            $table->double('ventaprecio_hasta_m2')->default(0); 
            $table->boolean('alquiler_residencial')->default(false);
            $table->double('alqres_precio_desde')->default(0); 
            $table->double('alqres_precio_hasta')->default(0); 
            $table->double('alqres_preciom2_desde')->default(0); 
            $table->double('alqres_preciom2_hasta')->default(0);
            $table->enum('opcioncompra', ['Si', 'No', 'Indiferente'])->default('Indiferente');
            $table->enum('moneda', ['EUR - Euro', 'USD - Dólar estadounidense'])->default('EUR - Euro'); 
            $table->integer('banos')->default(0);
            $table->integer('habitaciones')->default(0);

            
            $table->string('calle');
            // Zona
            $table->string('zona');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('demanda_rapida');
    }
}
