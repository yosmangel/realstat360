<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExterioresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exteriores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');
            $table->boolean('balcones')->default(false);
            $table->boolean('vista_al_mar')->default(false);
            $table->boolean('jardin_privado')->default(false);
            $table->boolean('patio')->default(false);
            $table->boolean('piscina_ext')->default(false);
            $table->boolean('piscina_comunitaria')->default(false);
            $table->boolean('primera_linea_mar')->default(false);
            $table->boolean('terraza')->default(false);
            $table->boolean('vista_montana')->default(false);
            $table->boolean('zona_comunitaria')->default(false);
            $table->boolean('zona_deportiva')->default(false);
            $table->boolean('zona_infantil')->default(false);
            $table->boolean('solo_chicas')->default(false);
            $table->boolean('solo_chicos')->default(false);
            $table->boolean('solo_no_fumadores')->default(false);
            $table->boolean('gastos_comunidad')->default(false);
            $table->boolean('menos_2_mese_fianza')->default(false);
            
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
        Schema::drop('exteriores');
    }
}
