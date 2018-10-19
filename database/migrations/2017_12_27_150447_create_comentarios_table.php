<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');

            /* id del inmueble sobre el que se realiza el comentario */
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');

            /* interesado_id: id del interesado en el inmueble */
            $table->integer('interesado_id')->unsigned();
            $table->foreign('interesado_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            /* propietario_id: id del propietario del inmueble */
            $table->integer('propietario_id')->unsigned();
            $table->foreign('propietario_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            /* Tipo de comentario: 1 respuesta, 0: pregunta */
            $table->boolean('respuesta')->default(false); 

            /* contenido del comentario */
            $table->string('comment');

            /* fecha en la que se creo el comentario */
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
        Schema::drop('comentarios');
    }
}
