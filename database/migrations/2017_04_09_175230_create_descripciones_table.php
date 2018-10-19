<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripciones', function (Blueprint $table) {
            $table->increments('id');
            /* DESCRIPCION DEL INMUEBLE */
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');
            $table->enum('idioma', ['Español', 'Inglés', 'Portugués']);
            $table->string('descripcion_corta');
            $table->text('descripcion_extendida');
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
        Schema::drop('descripciones');
    }
}
