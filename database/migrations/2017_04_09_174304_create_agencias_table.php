<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencias', function (Blueprint $table) {
            // Datos Generales
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->string('nombre');
            $table->enum('tipo_p1',['NIF','otro'])->default('NIF');
            $table->string('tipo_p2')->nullable();
            $table->enum('tipo_sociedad',['S.A.','otro'])->default('S.A.');
            $table->string('razon_social')->nullable();

            // Datos de Contacto
            $table->string('telefono')->nullable();
            $table->enum('telefono_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('movil')->nullable();
            $table->enum('movil_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('fax')->nullable();
            $table->enum('fax_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('email')->nullable();
            $table->enum('email_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('web')->nullable();

            // Direccion
            $table->integer('pais_id')->unsigned()->nullable();
            $table->foreign('pais_id')
                  ->references('id')
                  ->on('paises')
                  ->onDelete('cascade');
            $table->string('codigo_postal')->nullable();
            $table->integer('municipio_id')->unsigned()->nullable();
            $table->foreign('municipio_id')
                  ->references('id')
                  ->on('municipios')
                  ->onDelete('cascade');

            $table->integer('via_id')->unsigned()->nullable();
            $table->foreign('via_id')
                  ->references('id')
                  ->on('vias')
                  ->onDelete('cascade');
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->enum('piso', ['Sótano', 'Subsótano', 'Bajos', 'Entresuelo','Principal','1ro','2do','3ro','4to','5to'])->default('Principal');
            $table->string('escalera')->nullable();
            $table->string('puerta')->nullable();
            $table->text('notas')->nullable();

            $table->boolean('caducidad_inmuebles')->default(true);
            $table->boolean('caducidad_demandas')->default(true);

            // PENDIENTE CADUCIDAD DE INMUEBLES
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
        Schema::drop('agencias');
    }
}
