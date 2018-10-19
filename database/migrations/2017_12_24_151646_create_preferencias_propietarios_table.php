<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciasPropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferencias_propietarios', function (Blueprint $table) {
            $table->increments('id');
            /*
                Preferencias del Propietario
            */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->boolean('tratar_profesionales')->default(false);
            $table->boolean('tratar_demandantes')->default(true);
            $table->boolean('precio_no_negociable')->default(false);
            $table->boolean('imprescindible_aval')->default(false);
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
        Schema::drop('preferencias_propietarios');
    }
}
