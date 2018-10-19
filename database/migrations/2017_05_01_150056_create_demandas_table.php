<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandasTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('demandas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned()->default(0);
            $table->foreign('cliente_id')
                  ->references('id')
                  ->on('clientes')
                  ->onDelete('cascade');

            $table->integer('inmueble_id')->unsigned()->default(0);
            /*$table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');*/

            // Origen de la Demanda
            $table->enum('origen_demanda',[
                'Acciones de Buzoneo','Anuncio neon','anuncit.com','Buscador Web 2',
                'cartel 2', 'Cliente recomendado','Colaborador','dividendo.es','EL CORREO',
                'granmanzana.es','Idealista','Inmoportalix','Jornada Puertas Abiertas',
                'Llamada Telefonica','micasa.es','mitula.com','Oficina/Escaparate','otro',
                'pisocasas.com','plandeprotecciondealquiler.com','Redes Sociales','trovimap.com',
                'una web','wordinmo.com', 'RS360'])->default('RS360');

            // Canal de Comunicacion
            $table->enum('comunicacion',['Email','Llamada','Oficina'])->default('Email');

            // tipo_demanda: Interesado en un inmueble -> true
            //               Describir demanda
            $table->enum('tipo_demanda',['inmueble','describir_demanda'])->default('inmueble');

            // Tipo de Busqueda de la Demanda, se utiliza cuando se crea una demanda, para definir que datos se usaran al buscar inmuebles 
            $table->enum('opcion_busqueda',['basica','radio','mapa'])->default('basica');

            // Si la demanda se realiza a traves de la opcion de Describir Demanda
            $table->integer('tipo_inmueble_id')->default(1);
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

            // Clave Foranea de la pais
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')
                  ->references('id')
                  ->on('paises')
                  ->onDelete('cascade');
            // Clave Foranea del Provincias
            $table->integer('provincia_id')->unsigned();
            $table->foreign('provincia_id')
                  ->references('id')
                  ->on('provincias')
                  ->onDelete('cascade');
            //Direccion
            $table->integer('via_id')->unsigned();
            $table->foreign('via_id')
                  ->references('id')
                  ->on('vias')
                  ->onDelete('cascade');
            $table->string('calle');
            $table->string('numero');
            // Zona
            $table->string('zona');
            // Radio de busqueda
            $table->integer('radio')->unsigned();
            $table->text('notas');

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
        Schema::drop('demandas');
    }
}
