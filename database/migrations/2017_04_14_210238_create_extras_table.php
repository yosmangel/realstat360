<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inmueble_id')->unsigned()->nullable();
            $table->foreign('inmueble_id')
                  ->references('id')
                  ->on('inmuebles')
                  ->onDelete('cascade');


            // CALIDADES
            $table->enum('calidades',['Baja', 'Buena', 'Escasa','Lujo','Muy Buena','Normal','Superlujo'])->default('Normal');
            $table->enum('estado_aseos',['Buen estado', 'Necesita Reforma', 'Aseo de origen','Nuevo','Reformado'])->default('Buen estado');
            $table->enum('estado_banos',['Buen estado', 'Necesita Reforma', 'de origen','Nuevo','Reformado'])->default('Buen estado');
            $table->enum('estado_cocina',['Buen estado', 'Necesita Reforma', 'Cocina de origen','Nueva','Reformada'])->default('Buen estado');
            $table->enum('estado_edificio',['Buen estado', 'Necesita Reforma', 'En ruina','Nuevo','Reformado','Rehabilitado'])->default('Buen estado');
            $table->enum('tipo_edificio',['Clásico', 'Diseño', 'Moderno','Premiado','Regio','Representativo','Señorial','Singular'])->default('Clásico');
            $table->text('obs_calidades')->nullable();
            $table->boolean('calidades_ok')->default(false); // Flag para saber si ya se actualizaron los datos de calidades, 1 se guardaron, 0 no se guardaron, se utiliza para saber si mostrar esta informacion en la Ficha o no

            //SUPERFICIES Y DISTRIBUCION
            $table->integer('altura');
            $table->integer('num_hab_dobles');
            $table->integer('num_hab_individuales');
            $table->integer('num_suites');
            $table->integer('sup_util');
            $table->integer('sup_cocina');
            $table->integer('sup_edificada');
            $table->integer('sup_salon');
            $table->integer('sup_terrazas');
            $table->text('obs_superficies')->nullable();
            $table->boolean('supydist_ok')->default(false);

            //CARPINTERIA
            $table->integer('num_armarios');
            $table->enum('carp_exterior',['Aluminio', 'Aluminio Lacado', 'Hierro','Madera','Madera Barnizada','Madera Noble','Madera Pintada','Madera Teka','PVC'])->default('Madera');
            $table->enum('carp_interior',['Aluminio', 'Aluminio Lacado', 'Hierro','Madera','Madera Barnizada','Madera Embero','Madera Etimoe','Madera Haya','Madera Lacada','Madera Noble','Madera Pintada','Madera Sapelly','Madera Teka','PVC'])->default('Madera');
            $table->integer('persianas');
            $table->enum('puerta_principal',['Cuarterones', 'Hierro', 'Seguridad','Vidrio','Enrejada','Mazisa','Madera','Mixta','Normal','Reforzada'])->default('Normal');
            $table->enum('puertas_interiores',['Aluminio Lacado', 'Correderas', 'Cristal/Madera','Cuarterón','Embero','Etimoe','Inglesa','Nuevas','Rústicas','Sapelly','Tapizadas'])->default('Nuevas');
            $table->enum('ventanas',['Aluminio', 'Climalit', 'Cuarterones','Persianas','Rejas','Doble cristal','Madera','PVC'])->default('Madera');
            $table->text('obs_carpinteria')->nullable();
            $table->boolean('carpinteria_ok')->default(false);

            //ACABADOS
            $table->enum('acabados_paredes',['Corcho', 'Estuco', 'Estuco Veneciano','Gotele','Madera','Moqueta','Papel','Acabado'])->default('Acabado');
            $table->enum('paredes_banos',['Alicatado Ceramico', 'Gresite', 'Madera','Marmol','Pintura Plastica','Yeso'])->default('Madera');
            $table->enum('paredes_cocina',['Alicatado Ceramico', 'Madera','Marmol','Pintura Plastica','Yeso'])->default('Madera');
            $table->enum('suelos',['Baldosa', 'Baldosa Rustica','Ceramico','Corcho','Gres','Madera','Marmol','Tarima','Terrazo','Gresite','Linoleo','Moqueta','Mosaico','Porcelanato'])->default('Madera');
            $table->enum('suelos_banos',['Baldosa','Ceramico','Corcho','Gres','Madera','Marmol','Parquet','Terrazo','Gresite','Linoleo','Mosaico','Porcelanato'])->default('Baldosa');
            $table->enum('suelos_cocina',['Baldosa','Ceramico','Corcho','Gres','Madera','Marmol','Parquet','Terrazo','Gresite','Linoleo','Mosaico','Porcelanato'])->default('Baldosa');
            $table->enum('techo',['Altillos en Techo','Falso Techo','Cielo Raso','Techo de Bobeda','Lucido Yeso','Placas Registrables','Techos Altos','Artesonados','Madera'])->default('Madera');
            $table->enum('paredes',['Hormigon', 'Ladrillo', 'Pladur','Tabique'])->default('Ladrillo');
            $table->string('banneras');
            $table->string('griferia');
            $table->string('plato_duchas');
            $table->string('sanitarios');
            $table->text('obs_acabados')->nullable();
            $table->boolean('acabados_ok')->default(false);
            
            // INSTALACIONES Y SUMINISTROS
            $table->boolean('agua')->default(true);
            $table->boolean('gas')->default(true);
            $table->boolean('telefono')->default(true);
            $table->boolean('tvyfm')->default(true);
            $table->enum('agua_caliente',['Gas Butano', 'Gas Natural', 'Gas Propano','No tiene Gas','Termo-Electrico'])->default('Gas Natural');
            $table->enum('cocina',['Pequena','Americana','Amueblada','Con Armarios','Formica','Francesa','Kitchenette'])->default('Amueblada');
            $table->string('electricidad')->nullable();
            $table->enum('electrodomesticos',['Calentador de Agua', 'Cocina', 'Cocina de Gas','Cocina Electrica','Cocina Vitrocerámica','Congelador',
                'Equipo de Musica','Frigorifico','Hilo/Ambiente musical','Horno de Gas','Horno Eléctrico','Lavavajillas',
                'Muchos electrodomesticos','Secadora','Triturador Basura','Video'])->default('Cocina');
            $table->enum('equipamientos',['Antena TV Colectiva', 'Antena TV Parabolica', 'Auditorio','Centralita Telefonos','Electricidad Instalada',
                'Hilo Musical/Musica Ambiental','Lineas Digitales','Lineas Telefono Analogicas','Megafonia','Musica Ambiente','Portero Electronico',
                'Red Datos','Red Datos Perimetral','Sala de Juntas'])->default('Antena TV Colectiva');
            $table->string('fontaneria')->nullable();
            $table->string('iluminacion')->nullable();
            $table->enum('instalaciones',['Agua Propia', 'Aire Comprimido', 'Caja Fuerte','Camara Frigorifica','Contador Agua','Contador Gas',
                'Contador Luz','Deposito de Combustible','Deposito Residuos Contaminantes','Deposito Residuos Liquidos','Deposito Residuos Solidos',
                'Depuradora','Electricidad','Estanterias de Almacenaje','Extraccion Forzada de Aire','Foso','Gas','Grupo Electrogeno',
                'Iluminacion Patio Exterior','Lineas Telefonicas','Linea Cenital','Linea Lateral','Megafonia Interior','Plataforma Elevadora',
                'Polipasto','Puente Grua','Trasnformador'])->default('Contador Luz');
            $table->enum('instalaciones_edificio',['Agua Comunitaria', 'Aspirotec', 'Bajante Recogida de Basuras','Bocas Incendio en Edificio',
                'Columna Seca','Electricidad Comunitaria','Escalera de Incendios','Extintores Edificio','Gas Butano','Gas Ciudad','Gas Propano'])->default('Agua Comunitaria');
            $table->enum('instalaciones_privadas',['Acometida de Agua pie parc', 'Acometida de Gas pie parc', 'Acometida de Luz pie parc','Barbacoa','Cuadras','Deposito de Agua','Embarcadero','Fosa Septica','Fronton','Glorieta/Cenador','Iluminacion Jardin','Invernadero','Pozo Propio','Riego Automatico','Sistemas Domoticos','Squash'])->default('Acometida de Agua pie parc');
            $table->enum('refrigeracion',['Aacc Central', 'Aacc Consolas', 'Aacc Frio Calor','Aacc Solo Frio'])->default('Aacc Frio Calor');
            
            $table->integer('interruptores');
            $table->string('mecanismos')->nullable();
            $table->string('seguridad')->nullable();
            $table->integer('tomasdeagua');
            $table->text('obs_instalaciones')->nullable();
            $table->boolean('instysum_ok')->default(false);

            //DATOS ECONOMICOS
            $table->integer('gastos_comunidad')->nullable();
            $table->enum('calidad_precio',['Buen Precio', 'Caro', 'Ganga','Muy Caro','Precio Justo'])->default('Buen Precio');
            $table->boolean('rentabilidad')->default(false);
            $table->text('obs_datoseconomicos')->nullable();
            $table->boolean('dateco_ok')->default(false);
            
            //FINCA
            $table->enum('construccion',['Bloque Granito', 'Bloque Toro', 'Hormigon Prefabricado','Ladrillo Obra Vista','Obra Metalica','Plancha Metalica'])->default('Bloque Granito');
            $table->enum('estilo_construccion',['Casa de Pueblo', 'Cortijo', 'Diseno Exclusivo','Diseno Moderno','Estilo Pirenaico','Estilo Clasico','Estilo Colonial','Estilo Neoclásico','Estilo Provenzal','Estilo Rustico','Masía','Molino','Otras','Pazo'])->default('Estilo Clasico');
            $table->enum('estructura',['Hormigon', 'Madera', 'Metalica','Mixta','Vigas de Madera'])->default('Madera');
            $table->enum('portalyescalera',['Entrada servicio independiente', 'Portal noble', 'Portal señorial','Portal sin escalones','Portal y caja de escaleras'])->default('Entrada servicio independiente');
            $table->enum('puerta_entrada',['Barrera Vigilada', 'Persiana', 'Persiana Automatica','Puerta Abatible Manual','Puerta Batiente Automatica','Puerta Batiente Manual','Puerta Manual'])->default('Puerta Manual');
            $table->integer('numfachadas');
            $table->text('obs_finca')->nullable();
            $table->boolean('finca_ok')->default(false);
        
            //SITUACION Y ENTORNO
            $table->enum('calif_urbana',['Conservacion centro historico', 'Densificacion urbana intensiva', 'Densificacion urbana semi-intensiva','Industrial','Remodelacion privada','Remodelacion publica','Sub-zonas plurifamiliares','Sub-zonas unifamiliares','Sustitucion edificacion antigua','Verde privado protegido'])->default('Industrial');
            $table->enum('cercania_a',['Campo de Golf', 'Playa', 'Lago','Mar','Pantano','Pistas de Esquí','Pueblo','Río','Primera Línea de Playa','Segunda Línea de Playa'])->default('Mar');
            $table->enum('elementos_comunitarios',['Antena colectiva', 'Antena parabolica', 'Club social','Fronton','Interfono','Piscina','Pista de tenis','Portero automatico','Sala de lavanderia','Solarium','Squash','Television por cable','Television por satelite','Terrado con tendedero'])->default('Television por cable');
            $table->enum('entorno',['Cerca zona comercial', 'Edificio aislado', 'Pocos vecinos','Zona alto nivel','Zona bien comunicada','Zona céntrica','Zona habitada permanentemente','Zona rural','Zona tranquila','Zona urbana'])->default('Zona urbana');
            $table->enum('equipamientos_zonas',['Cerca campo golf', 'Cerca colegios', 'Cerca farmacia','Cerca guarderia','Cerca instalaciones colectivas','Cerca mercado','Cerca parque publico','Cerca supermercado','Cerca zona comercial'])->default('Cerca mercado');
            $table->enum('grado_urbanizacion',['Alto', 'Bajo', 'Medio','Muy Alto','Muy Bajo'])->default('Medio');
            $table->enum('sol',['Muy luminosos', 'Sol mañanas', 'Sol tardes','Sol todo el dia','Soleado'])->default('Soleado');
            $table->enum('transportes_publicos',['Bien comunicado transp. publicos','Cerca aeropuerto','Cerca autobuses','Cerca estacion ferrocarril','Cerca estacion tren cercanias','Cerca metro','Cerca puerto','Cerca tranvia','Comunicaciones bien','Comunicaciones mal','Comunicaciones muy bien transp. publicos','Comunicaciones muy buenas','Comunicaciones regular'])->default('Cerca autobuses');
            $table->enum('vistas',['Buenas vistas','Vistas a patio interior manzana','Vistas a calle','Vistas a campo de golf','Vistas a estacion de esqui','Vistas a la ciudad','Vistas a la montana','Vistas a la piscina','Vistas a la zona comunitaria','Vistas a la zona deportiva','Vistas a la zona verde','Vistas a mar y montana','Vistas a parque nacional','Vistas a parque publico','Vistas a patio interior ajardinado','Vistas a plaza','Vistas al lago','Vistas al mar','Vistas al puerto','Vistas al valle'])->default('Vistas a calle');
            $table->string('distancia_poblacion')->nullable();
            $table->text('obs_situacion')->nullable();
            $table->boolean('siten_ok')->default(false);

            // URL: En la pestana Fotos y Documentos se puede almacenar
            // una url de un Video del inmueble
            $table->string('url')->nullable();

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
        Schema::drop('extras');
    }
}
