<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');

            /*********************/
            /** DATOS GENERALES **/
            /*********************/
            // El id del usuario que crea al cliente se almacena como clave foranea
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            // Persona/Organizacion
            //    1 Persona
            //    2 Organizacion
            $table->enum('persorgz', [1, 2])->default(1);

            // Calificativo
            //    1 Sr.
            //    2 Sra.
            $table->enum('calificativo', [1, 2])->default(1);
            
            $table->string('nombre',50);
            $table->string('apellidos');
            $table->string('alias',20);
            $table->date('fecha_nacimiento');
            $table->enum('estado_civil',['Casado','Soltero','Viudo','Divorciado','Separado Judicialmente','Union de Hechos','Otro']);
            $table->enum('tipo_doc',['NIF','CIF','Pasaporte','NIE','DNI','Otro'])->default('NIF');
            $table->string('tipo_doc_num')->nullable();
            $table->integer('idioma_id')->unsigned(); 
            $table->foreign('idioma_id')
                  ->references('id')
                  ->on('idiomas')
                  ->onDelete('cascade');
            $table->enum('tipo_cliente',['Accionista','Agencia Colaboradora','Arrendador','Asociado','Colaborador','Competencia','Comprador','Constructor','Copropietario','Inquilino','Inversor','Operador','Permutante','Potencial Arrendador','Potencial Inquilino','Potencial Comprador','Potencial Vendedor','Prensa Especializada','Promotor','Traspasante','Vendedor','Banco'])->default('Comprador');
            // Datos internos
            $table->enum('origen',['Acciones de Buzoneo','Anuncio neon','anuncit.com','Buscador Web 2','cartel 2', 'Cliente recomendado','Colaborador','dividendo.es','EL CORREO','granmanzana.es','Idealista','Inmoportalix','Jornada Puertas Abiertas','Llamada Telefonica','micasa.es','mitula.com','Oficina/Escaparate','otro','pisocasas.com','plandeprotecciondealquiler.com','Redes Sociales','trovimap.com','una web','wordinmo.com'])->default('otro');
            $table->date('fecha_alta');
            $table->enum('estado',['Inactivo','Activo','Potencial','Activo A','Activo B','Activo C','Activo D']);

            // DATOS DE CONTACTO
            $table->string('telefono')->nullable();
            $table->enum('telefono_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('movil')->nullable();
            $table->enum('movil_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('fax')->nullable();
            $table->enum('fax_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('email')->nullable();
            $table->enum('email_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');

            $table->string('telefono2')->nullable();
            $table->enum('telefono_de2',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('movil2')->nullable();
            $table->enum('movil_de2',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('fax2')->nullable();
            $table->enum('fax_de2',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('email2')->nullable();
            $table->enum('email_de2',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');

            $table->string('web')->nullable();

            /*********************/
            /** DATOS DIRECCION **/
            /*********************/
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
            $table->enum('piso', ['Principal','1ro','2do','3ro','4to','5to','Sótano', 'Subsótano', 'Bajos', 'Entresuelo'])->default('Principal');
            $table->string('escalera')->nullable();
            $table->string('puerta')->nullable();

            /********************************/
            /** OTRAS PERSONAS DE CONTACTO **/
            /********************************/
            $table->enum('tiporelacion', ['Otro','Hijo(Hija)','Madre(Padre)','Esposo(Esposa)'])->default('Otro');
            // Calificativo
            //    1 Sr.
            //    2 Sra.
            $table->enum('calificativo_otrocont', [1, 2])->default(1);
            $table->string('nombre_otrocont',50);
            $table->string('ape_otrocont');
            $table->string('tel_otrocont')->nullable();
            $table->enum('tel_otrocont_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('mov_otrocont')->nullable();
            $table->enum('mov_otrocont_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('fax_otrocont')->nullable();
            $table->enum('fax_otrocont_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('email_otrocont')->nullable();
            $table->enum('email_otrocont_de',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');

            $table->string('tel_otrocont2')->nullable();
            $table->enum('tel_otrocont_de2',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('mov_otrocont2')->nullable();
            $table->enum('mov_otrocont_de2',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('fax_otrocont2')->nullable();
            $table->enum('fax_otrocont_de2',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');
            $table->string('email_otrocont2')->nullable();
            $table->enum('email_otrocont_de2',['Casa','Otro','Personal','Principal','Trabajo'])->default('Otro');

            $table->date('fecha_nac_otrocon');
            $table->enum('estado_civil_otrocon',['Casado','Soltero','Viudo','Divorciado','Separado Judicialmente','Union de Hechos','Otro']);
            $table->enum('tipo_doc_otrocon',['NIF','CIF','Pasaporte','NIE','DNI','Otro'])->default('NIF');
            $table->string('tipo_doc_num_otrocon')->nullable();
            $table->integer('idioma_otrocon')->unsigned(); 
            $table->foreign('idioma_otrocon')
                  ->references('id')
                  ->on('idiomas')
                  ->onDelete('cascade');

            $table->integer('pais_otrocont')->unsigned()->nullable();
            $table->foreign('pais_otrocont')
                  ->references('id')
                  ->on('paises')
                  ->onDelete('cascade');
            $table->string('codigo_postalotrocont')->nullable();
            $table->integer('municipio_idotrocont')->unsigned()->nullable();
            $table->foreign('municipio_idotrocont')
                  ->references('id')
                  ->on('municipios')
                  ->onDelete('cascade');

            $table->integer('via_idotrocont')->unsigned()->nullable();
            $table->foreign('via_idotrocont')
                  ->references('id')
                  ->on('vias')
                  ->onDelete('cascade');
            $table->string('calle_otrocont')->nullable();
            $table->string('numero_otrocont')->nullable();
            $table->enum('piso_otrocont',['Principal','1ro','2do','3ro','4to','5to','Sótano', 'Subsótano', 'Bajos', 'Entresuelo'])->default('Principal');
            $table->string('escalera_otrocont')->nullable();
            $table->string('puerta_otrocont')->nullable();

            /*****************/
            /** COMENTARIOS **/
            /*****************/
            $table->text('comentarios')->nullable();

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
        Schema::drop('clientes');
    }
}
