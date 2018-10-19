<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->increments('id');
            //$table->index('id','referencia');
            
            /* TIPOS DE INMUEBLE: Clave Foranea de la tabla TIPOS */
            $table->integer('tipo_id')->unsigned(); // Tipo de Inmueble, ej, Apartamento
            $table->foreign('tipo_id')
                  ->references('id')
                  ->on('tipos')
                  ->onDelete('cascade');

            $table->float('lat');
            $table->float('lng');

            /* CATEGORIA DEL INMUEBLE: Clave Foranea de la tabla CATEGORIAS */
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('cascade');

            $table->integer('cliente_id')->unsigned()->default(0);
            /*$table->foreign('cliente_id')
                  ->references('id')
                  ->on('clientes')
                  ->onDelete('cascade');*/

            // ¿Es obra nueva?
            $table->boolean('obranueva')->default(false); 
            $table->integer('promocion_id')->unsigned()->default(0);
            /*$table->foreign('promocion_id')
                  ->references('id')
                  ->on('promociones')
                  ->onDelete('cascade');*/
            /*$table->integer('tipologia_id')->unsigned();
            $table->foreign('tipologia_id')
                  ->references('id')
                  ->on('tipologias')
                  ->onDelete('cascade');*/

            // Adjudicacion Bancaria
            $table->boolean('adjbancaria')->default(false);
            $table->integer('entidad_id')->unsigned(); 
            $table->foreign('entidad_id')
                  ->references('id')
                  ->on('entidades')
                  ->onDelete('cascade');

            $table->date('fecha_alta');

            $table->enum('estado', ['disponible', 'reservado', 'captacion', 'nodisponible','enconstruccion']);
            $table->enum('periodicidad', ['Indiferente', 'Diario', 'Semana', 'Mes']);
            /* AGENCIA */
            $table->integer('agencia_id')->unsigned();
            $table->foreign('agencia_id')
                  ->references('id')
                  ->on('agencias')
                  ->onDelete('cascade');

            // Clave Foranea del id del usuario propietario o agente
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->string('nombre', 200)->nullable(); // Nombre del inmueble, ej: "Apartamento en zona centro de Madrid"
            
            $table->double('superficie'); // Campo opcional de la superficie en metros cuadrados del terreno donde esta el inmueble
            $table->double('superficie_solar'); 
            $table->boolean('ocultarsuperficie')->default(false);
            
            /* MODALIDADES DE VENTA AQUILER, TRASPASO, ... */
            // Son almacenadas en la tabla modalidades
            /*$table->integer('modalidad_id')->unsigned();
            $table->foreign('modalidad_id')
                  ->references('id')
                  ->on('modalidades')
                  ->onDelete('cascade');*/

            /* ADDRESS*/ 
            $table->string('zona')->nullable(); // Zona, por el momento solo sera un strig
            
            // Clave Foranea del Provincias
            $table->integer('provincia_id')->unsigned();
            $table->foreign('provincia_id')
                  ->references('id')
                  ->on('provincias')
                  ->onDelete('cascade');
            $table->string('codigo_postal');
            // Clave Foranea de la ciudad
            $table->integer('ciudad_id')->unsigned();
            $table->foreign('ciudad_id')
                  ->references('id')
                  ->on('ciudades')
                  ->onDelete('cascade');
            // Clave Foranea de la pais
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')
                  ->references('id')
                  ->on('paises')
                  ->onDelete('cascade');
            // Clave Foranea del Distrito
            /*$table->integer('distrito_id')->unsigned();
            $table->foreign('distrito_id')
                  ->references('id')
                  ->on('distritos')
                  ->onDelete('cascade');*/
            // Clave Foranea del Municipio
            /*$table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')
                  ->references('id')
                  ->on('municipios')
                  ->onDelete('cascade');*/

            //Direccion
            $table->integer('via_id')->unsigned();
            $table->foreign('via_id')
                  ->references('id')
                  ->on('vias')
                  ->onDelete('cascade');

            $table->string('calle');
            $table->string('numero');
            $table->enum('piso', ['Sótano', 'Subsótano', 'Bajos', 'Entresuelo','Principal','1ro','2do','3ro','4to','5to']);
            $table->string('escalera');
            $table->string('puerta');

            // Mostrar Direccion
            //    1 Calle y Numero
            //    2 Solo Calle
            //    3 Zona
            $table->enum('mostrardireccion', [1, 2, 3])->default(1); 

            $table->string('id_portada')->nullable();

            // IFRAME DEL MAPA
            $table->string('maps');    
            
            $table->enum('moneda', ['EUR - Euro', 'USD - Dólar estadounidense']); 

            // Clave Foranea del id del idioma de la descripcion
            $table->integer('idioma_id')->unsigned();
            $table->foreign('idioma_id')
                  ->references('id')
                  ->on('idiomas')
                  ->onDelete('cascade');
            $table->integer('idioma_id2')->unsigned();
            $table->foreign('idioma_id2')
                  ->references('id')
                  ->on('idiomas')
                  ->onDelete('cascade');
                  
            $table->string('descripcion_corta');
            $table->text('descripcion_extendida');
            $table->string('descripcion_corta2');
            $table->text('descripcion_extendida2');

            // Datos de Contacto en Publicaciones
            $table->string('persona'); // Persona de Contacto
            $table->boolean('mostrar_contacto')->default(true); // Si true: Mostrar datos de la Agencia, Si false: mostrar datos del inmueble

            /*$table->double('precio_total');
            $table->enum('tasa_precio_total', ['completo', 'hora', 'dia', 'mes']);
            $table->double('precio_por_metro');
            $table->enum('tasa_precio_por_metro', ['completo', 'hora', 'dia', 'mes']);
            $table->boolean('mostrar_precio')->default(true);*/


            /*$table->boolean('adjudicado')->default(true);
            $table->string('num_registro_turismo');
            */
            
            $table->string('anio_contruccion')->defaut('-');
            $table->enum('conservacion', ['Buena', 'Muy Buena', 'Excelente', 'Regular', 'Necesita Reforma'])->default('Buena');
            $table->enum('orientacion', ['norte', 'sur', 'este', 'oeste', 'noroeste', 'noreste', 'sureste', 'suroeste']);
            $table->enum('tiponave', ['adosada', 'aislada'])->defaut('aislada');
            $table->text('obs_datos');
            $table->text('extras_basicos');

            $table->enum('agua_caliente', ['Gas Natural', 'Electricidad', 'Gasoleo', 'Butano', 'Propano','Solar']);
            $table->enum('calefaccion', ['Gas Natural', 'Electricidad', 'Gasóleo', 'Butano', 'Propano','Solar']);
            $table->enum('certificado_energetico', ['A', 'B', 'C', 'D', 'E','F','G','En Trámite','Excento'])->default('en tramite');
            $table->integer('num_despachos')->defaut(0);
            $table->integer('num_aseos')->defaut(0);
            $table->integer('habitaciones'); // Numero de habitaciones
            $table->integer('banos');
            $table->integer('camas');
            $table->string('num_registro_turismo');

            //$table->string('image', 200);
            
            // Publicacion del Inmueble; 
            // true: accesible a busquedas una ves completada la descripcion del inmueble
            // false: solo disponible para el propietario
            //$table->boolean('publication_type')->default(false);

            // Preferencia para que el inmueble pueda ser encontrado por otros usuarios
            //$table->boolean('precio_negociable')->default(true);
            //$table->boolean('imprescindible_aval')->default(false);


            // Al eliminar el inmueble cambiamos el estado a 0 pero no lo eliminamos de la base de datos
            $table->boolean('active')->default(true);
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
        Schema::drop('inmuebles');
    }
}
