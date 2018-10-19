<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFincaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finca', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');
            $table->boolean('ascensor')->default(false);
            $table->boolean('conserje')->default(false);
            $table->boolean('energia_solar')->default(false);
            $table->boolean('garage_privado')->default(false);
            $table->boolean('parking_comunitario')->default(false);
            $table->boolean('trastero')->default(false);
            $table->boolean('video_portero')->default(false);
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
        Schema::drop('finca');
    }
}
