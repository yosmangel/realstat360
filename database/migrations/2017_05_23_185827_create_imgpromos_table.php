<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgpromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgpromos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promocion_id')->unsigned();
            $table->foreign('promocion_id')
                  ->references('id')
                  ->on('promociones')
                  ->onDelete('cascade');
            $table->string('nombre');
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
        Schema::drop('imgpromos');
    }
}
