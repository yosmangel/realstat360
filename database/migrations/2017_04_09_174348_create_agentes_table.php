<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentes', function (Blueprint $table) {
            $table->increments('id');
            
            /* DATOS GENERALES */
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('avatar')->default('user_default.jpg');
            $table->integer('idioma_id')->unsigned();
            $table->foreign('idioma_id')
                  ->references('id')
                  ->on('idiomas')
                  ->onDelete('cascade');
            $table->string('color'); // Color Asignado
            $table->boolean('acceso')->default(true); // true: permitido, false: no permitido
            $table->enum('rol',['Gestor','Propietario','Comercial']);
           // $table->string('horario'); // Se seguira la codificacion 01110010101010, donde los dos primeros digitos 
                                       // corresponden al Lunes (mañana y tarde, 0 si es false 1 si es true), los dos
                                       // segundos al Martes, y asi. En total son 14 digitos en este string, ni mas ni menos.
            $table->boolean('lun_man')->default(false);
            $table->boolean('lun_tar')->default(false); 
            $table->boolean('mar_man')->default(false);
            $table->boolean('mar_tar')->default(false);
            $table->boolean('mie_man')->default(false);
            $table->boolean('mie_tar')->default(false);
            $table->boolean('jue_man')->default(false);
            $table->boolean('jue_tar')->default(false);
            $table->boolean('vie_man')->default(false);
            $table->boolean('vie_tar')->default(false);
            $table->boolean('sab_man')->default(false);
            $table->boolean('sab_tar')->default(false);
            $table->boolean('dom_man')->default(false);
            $table->boolean('dom_tar')->default(false);

            $table->boolean('tratamiento')->default(true); // true: Sr., false: Sra.

            /* GESTION DE ENTIDADES */
            $table->boolean('clientes_permitidos')->default(true); // true: todos, false: solo los asignados al agente
            $table->boolean('acciones_permitidas')->default(true); // true: todas, false: solo las asignadas al agente
            $table->boolean('inmuebles_permitidos')->default(true); // true: todos, false: solo los asignados

            /* DATOS DE CONTACTO */
            $table->string('telefono');
            $table->enum('telefono_de',['Casa','Personal', 'Principal','Trabajo','Otro']);
            $table->string('movil');
            $table->enum('movil_de',['Casa','Personal', 'Principal','Trabajo','Otro']);
            $table->string('fax');
            $table->enum('fax_de',['Casa','Personal', 'Principal','Trabajo','Otro']);
            $table->string('telefono2');
            $table->enum('telefono_de2',['Casa','Personal', 'Principal','Trabajo','Otro']);
            $table->string('movil2');
            $table->enum('movil_de2',['Casa','Personal', 'Principal','Trabajo','Otro']);
            $table->string('fax2');
            $table->enum('fax_de2',['Casa','Personal', 'Principal','Trabajo','Otro']);    
            $table->string('email');  
            $table->enum('email_de',['Casa','Personal', 'Principal','Trabajo','Otro']);  

            /* AGENCIA */
            $table->integer('agencia_id')->unsigned(); // Tipo de Inmueble, ej, Apartamento
            $table->foreign('agencia_id')
                  ->references('id')
                  ->on('agencias')
                  ->onDelete('cascade');
            $table->enum('departamento',['Comercial','Administracion','Gerencia']);
            $table->enum('cargo',['Comercial','Responsable Comercial','Comercial Junior',
                                  'Administracion','Responsable Administracion','Gerencia',
                                  'Direccion General']);
            $table->boolean('estado')->default(true); // true: Activo, false: Inactivo;   
            $table->date('fecha_alta');  
            $table->text('notas'); 

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
        Schema::drop('agentes');
    }
}
