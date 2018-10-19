<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciasDemandanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferencias_demandante', function (Blueprint $table) {
            $table->increments('id');
            /*
                Preferencias del Usuario
            */
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->boolean('tratar_solo_propietarios')->default(false);
            $table->boolean('compra')->default(true);
            $table->boolean('arrienda')->default(true);
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
        Schema::drop('preferencias_demandante');
    }
}
