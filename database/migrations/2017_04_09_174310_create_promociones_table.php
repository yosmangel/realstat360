<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->increments('id');

             // Clave Foranea del Usuario que crea la promocion
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            //$table->string('referencia', 12)->default(0); // Identificador interno de la promocion: "PROM" + ultimo_id_de_promocion + 1  
            $table->string('nombre', 200)->unique(); 
            $table->enum('tipo_promocion',['1','2','3']); // 1: Residencial, 2: Oficina/Local, 3: Industrial
            $table->string('constr', 200); // Nombre de la Constructora que realiza la obra
            $table->string('promotor', 200); // Nombre del promotor
            $table->string('comercializa', 200); // Nombre de la persona que comercializa la obra
            $table->enum('tipoVPO',['VPO_Vivienda_Prot_Ofi', 'VPP_Vivienda_Prot_Pub', 'VPPL_Vivienda_Prot_Pub_Precio_Limitado', 'VPPA_Vivienda_Prot_Pub_para_Arrendamiento']);
            // VPO - Vivienda con Proteccion Oficial, VPP – Vivienda con Proteccion Publica, VPPL – Vivienda de Proteccion Publica de Precio Limitado, VPPA – Vivienda con Proteccion Publica para Arrendamiento
            $table->date('fecha_entrega');
            $table->integer('anio_contruccion');
            $table->enum('cert_energ',['A','B','C','D','E','F','G','en tramite','excento']);
            $table->date('fecha_alta'); 
            $table->enum('estado',['disponible','nodisponible','enconstruccion']);

            // Clave Foranea de la pais
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')
                  ->references('id')
                  ->on('paises')
                  ->onDelete('cascade');
            $table->string('codigo_postal');

            // Clave Foranea del Municipio
            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')
                  ->references('id')
                  ->on('municipios')
                  ->onDelete('cascade');

            //Tipo de Via
            $table->integer('via_id')->unsigned();
            $table->foreign('via_id')
                  ->references('id')
                  ->on('vias')
                  ->onDelete('cascade');

            $table->string('calle');
            $table->string('numero');
            $table->enum('piso', ['Sotano', 'Subsotano', 'Bajos', 'Entresuelo','Principal','1ro','2do','3ro','4to','5to']);
            $table->string('escalera');
            $table->string('puerta');

            // Mostrar Direccion
            //    1 Calle y Numero
            //    2 Solo Calle
            //    3 Zona
            $table->enum('mostrardireccion', [1, 2, 3])->default(1); 
            $table->string('zona')->nullable();

            /* Extras de la promocion */
            $table->boolean('ascensor_prin')->default(false);
            $table->boolean('ascensor_serv')->default(false);
            $table->boolean('domotica')->default(false);
            $table->boolean('parking_comu')->default(false);
            $table->boolean('parking_priv')->default(false);
            $table->boolean('piscina_priv')->default(false);
            $table->boolean('trastero')->default(false);
            $table->boolean('zona_depor')->default(false);
            $table->boolean('zona_comu')->default(false);
            $table->boolean('zona_infa')->default(false);
            $table->boolean('energia_solar')->default(false);
            $table->boolean('serv_porteria')->default(false);

            /* Extras Oficina/Local */
            $table->boolean('alarma')->default(false);
            $table->boolean('montacargas')->default(false);
            $table->boolean('park_publico')->default(false);
            $table->boolean('suelo')->default(false);
            $table->boolean('ascensor')->default(false);
            $table->boolean('ofloc_parking_privado')->default(false);
            $table->boolean('ofloc_servicio_porteria')->default(false);
            $table->boolean('ofloc_trastero')->default(false);

            /* Extras Industrial */
            $table->boolean('ind_ascensor')->default(false);
            $table->boolean('muelles')->default(false);
            $table->boolean('ind_parking_publico')->default(false);
            $table->boolean('ind_parking_privado')->default(false);
            $table->boolean('ind_montacargas')->default(false);
            $table->boolean('ind_trastero')->default(false);

            $table->text('obs_extras');

            // Clave Foranea del id del idioma de la descripcion
            $table->integer('idioma_id')->unsigned();
            $table->foreign('idioma_id')
                  ->references('id')
                  ->on('idiomas')
                  ->onDelete('cascade');
            $table->string('descripcion_corta');
            $table->text('descripcion_extendida');
            $table->text('slogan');
            $table->text('slogan_financiero');
            $table->text('condiciones_economicas');
            $table->text('memoria');
            
            $table->integer('idioma_id2')->unsigned()->nullable();
            $table->foreign('idioma_id2')
                  ->references('id')
                  ->on('idiomas')
                  ->onDelete('cascade');
            $table->string('descripcion_corta2')->nullable();
            $table->text('descripcion_extendida2')->nullable();
            $table->text('slogan2')->nullable();
            $table->text('slogan_financiero2')->nullable();;
            $table->text('condiciones_economicas2')->nullable();
            $table->text('memoria2')->nullable();

            // Datos de Contacto en Publicaciones
            $table->string('persona'); // Persona de Contacto
            $table->enum('mostrar_contacto',['datos_agencia','agente_inmueble','otros_datos'])->default('datos_agencia'); // Si datos_agencia: Mostrar datos de la Agencia, Si agente_inmueble: mostrar datos del inmueble
            $table->string('email_contacto')->nullable();
            $table->string('telefono_contacto')->nullable();


            /* Panel de Datos Internos */
            $table->integer('agencia_id')->unsigned();
            $table->foreign('agencia_id')
                  ->references('id')
                  ->on('agencias')
                  ->onDelete('cascade');

            //$table->string('agente')->nullable();
            $table->string('cliente_propietario')->nullable();
            $table->enum('medio_captacion',['el_correo','worldimmo','trovimap','anuncit','web','idealista','mitula','granmanzana','plandeprotecciondealquiler','inmoportalix','Divendo','Micasa','Pisocasas','anuncioneon','puertas_abiertas','llamada_telefonica','Cartel2','Buscador','Otro'])->default('Otro');
            $table->boolean('contrato')->default(false);
            $table->date('inicio_contrato')->nullable();
            $table->date('fin_contrato')->nullable();
            $table->boolean('inm_exclusiva')->default(false);
            $table->enum('llaves',['Porteria','Oficina','empresa_delegada','Propietario','Inquilino'])->default('Propietario');
            $table->string('coment_llaves')->nullable();
            $table->text('notas_internas')->nullable();
            
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
        Schema::drop('promociones');
    }
}
