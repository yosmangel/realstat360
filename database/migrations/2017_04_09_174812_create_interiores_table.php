<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterioresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interiores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');
            
            //* Servicios Interiores */
            $table->boolean('aire_acondicionado')->default(false);
            $table->boolean('amueblado')->default(false);
            $table->boolean('armarios')->default(false);
            $table->boolean('cocina_equipada')->default(false);
            $table->boolean('cocina_office')->default(false);
            $table->boolean('calefaccion_int')->default(false);
            $table->boolean('electrodomesticos')->default(false);
            $table->boolean('domotica')->default(false);
            $table->boolean('gresceramica')->default(false);
            $table->boolean('horno')->default(false);
            $table->boolean('internet')->default(false);
            $table->boolean('wifi')->default(false);
            $table->boolean('lavadora')->default(false);
            $table->boolean('microondas')->default(false);
            $table->boolean('nevera')->default(false);
            $table->boolean('no_amueblado')->default(false);
            $table->boolean('parquet')->default(false);
            $table->boolean('puerta_blindada')->default(false);
            $table->boolean('mascotas')->default(false);
            $table->boolean('suite_con_bano')->default(false);
            $table->boolean('lavadero')->default(false);
            $table->boolean('television')->default(false);
            $table->boolean('sauna')->default(false);
            $table->boolean('piscina')->default(false);
            $table->boolean('salida_de_humos')->default(false);
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
        Schema::drop('interiores');
    }
}
