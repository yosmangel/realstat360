<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('inmueble_id')->unsigned()->nullable();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');

            $table->integer('agencia_id')->unsigned()->nullable();
            $table->foreign('agencia_id')
                  ->references('id')
                  ->on('agencias')
                  ->onDelete('cascade');
            $table->integer('agente_id')->unsigned()->nullable();
            $table->foreign('agente_id')
                  ->references('id')
                  ->on('agentes')
                  ->onDelete('cascade');
            $table->integer('cliente_prop_id')->unsigned()->nullable();
            $table->foreign('cliente_prop_id')
                  ->references('id')
                  ->on('clientes')
                  ->onDelete('cascade');

            // Modalidad
            $table->double('alqres_precio_pub')->nullable();
            $table->double('alqres_precio_prop')->nullable();
            $table->text('honorarios')->nullable();

            // Datos internos
            $table->enum('medio_captacion',[
                'Acciones de Buzoneo','Anuncio neon','anuncit.com','Buscador Web 2',
                'cartel 2', 'Cliente recomendado','Colaborador','dividendo.es','EL CORREO',
                'granmanzana.es','Idealista','Inmoportalix','Jornada Puertas Abiertas',
                'Llamada Telefonica','micasa.es','mitula.com','Oficina/Escaparate','otro',
                'pisocasas.com','plandeprotecciondealquiler.com','Redes Sociales','trovimap.com',
                'una web','wordinmo.com'])->default('otro')->nullable();

            $table->boolean('contrato_firmado')->default(false)->nullable();
            $table->date('ini_contrato')->nullable();
            $table->date('fin_contrato')->nullable();
            $table->boolean('en_exclusica')->default(false);
            $table->enum('ubicacion_llaves',['Porteria','Oficina','Empresa delegada','Propietario','Inquilino'])->default('Propietario')->nullable();
            $table->text('comment_llaves')->nullable();

            // Datos Registrables
            $table->string('reg_num')->nullable();
            $table->string('reg_tomo')->nullable();
            $table->string('reg_libro')->nullable();
            $table->string('reg_folio')->nullable();
            $table->string('reg_finca')->nullable();
            $table->string('reg_registrode')->nullable();
            $table->string('reg_desregistral')->nullable();
            $table->string('reg_catastral')->nullable();

            // Notas Internas
            $table->text('notas_int')->nullable();

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
        Schema::drop('internos');
    }
}
