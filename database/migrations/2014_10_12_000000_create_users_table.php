<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('lastname')->nullable(); 
            $table->string('avatar')->nullable();
            $table->string('telephone')->nullable();
            $table->string('address')->nullable();
            $table->boolean('active')->default(true); 
            
            // Este campo se utiliza para verificar la cuenta via email
            $table->boolean('verified')->default(false);

            /* 
                0: Propietario,
                1: Profesionales y Agencias, Agente Inmobiliario 
                2: Firma Comercial, 3: Marca Comercial, 4: Usuarios Particulares, 
                25: Administrador 
            */
            $table->enum('user_type',[0,1,2,3,4,25])->default(1); 


            //$table->enum('type',['0 propietario','4 agente','-1 administrador'])->default('propietario');

            // Token para la API
            $table->string('api_token')->unique();
            
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
