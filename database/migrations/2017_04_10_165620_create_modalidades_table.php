<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // MODALIDADES: Venta, Alquiler, etc.

    public function up() 
    {
        Schema::create('modalidades', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');

            // Venta
            $table->boolean('venta')->default(false);
            $table->double('ventaprecio');
            $table->double('ventaprecio2');
            
            // Alquiler Residencial
            $table->boolean('alquiler_residencial')->default(false);
            $table->double('alqresprecio');
            $table->double('alqresprecio2');
            $table->boolean('opcion_compra')->default(false);
            $table->double('opcioncompraprecio');
            $table->double('opcioncompraprecio2');

            // Alquiler Vacacional
            $table->boolean('alquiler_vacacional')->default(false);
            $table->boolean('alqvac_dia')->default(false);
            $table->double('alqvac_dia_p');
            $table->double('alqvac_dia_pm2');
            $table->boolean('alqvac_semana')->default(false);
            $table->double('alqvac_semana_p');
            $table->double('alqvac_semana_pm2');
            $table->boolean('alqvac_quincena')->default(false);
            $table->double('alqvac_quincena_p');
            $table->double('alqvac_quincena_pm2');
            $table->boolean('alqvac_mes')->default(false);
            $table->double('alqvac_mes_p');
            $table->double('alqvac_mes_pm2');
            $table->boolean('alqvac_temporada')->default(false);
            $table->double('alqvac_temporada_p');
            $table->double('alqvac_temporada_pm2');
            $table->boolean('alqvac_anno')->default(false);
            $table->double('alqvac_anno_p');
            $table->double('alqvac_anno_pm2');

            //Traspaso
            $table->boolean('traspaso')->default(false);
            $table->double('traspasoprecio');
            $table->double('traspasoprecio2');

            // Compartir
            $table->boolean('compartir')->default(false);
            $table->enum('periodicidad', ['Indiferente','Diario','Semana','Mes']);
            $table->double('compartirprecio');
            $table->double('compartirprecio2');
            

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
        Schema::drop('modalidades');
    }
}