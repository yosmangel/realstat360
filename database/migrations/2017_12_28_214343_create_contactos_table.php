<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('id');

            // ID del usuario contactante
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            // ID del propietario
            $table->integer('propietario_id')->unsigned();
            $table->foreign('propietario_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            // ID del inmueble
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');

            $table->string('mensaje');
            // flag de aceptado=1/rechazado=0/pendiente=2
            $table->enum('flag', [0, 1, 2])->default(2);
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
        Schema::drop('contactos');
    }
}
