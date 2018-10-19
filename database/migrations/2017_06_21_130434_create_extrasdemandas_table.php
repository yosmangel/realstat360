<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtrasdemandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extrasdemandas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('demanda_id')->unsigned()->nullable();
            $table->foreign('demanda_id')
                  ->references('id')
                  ->on('demandas')
                  ->onDelete('cascade'); 

            // CALIDADES
            $table->enum('calidades',['Baja', 'Buena', 'Escasa','Lujo','Muy Buena','Normal','Superlujo','Indiferente'])->default('Indiferente');
            $table->enum('estado_aseos',['Buen estado', 'Necesita Reforma', 'Aseo de origen','Nuevo','Reformado','Indiferente'])->default('Indiferente');
            $table->enum('estado_banos',['Buen estado', 'Necesita Reforma', 'de origen','Nuevo','Reformado','Indiferente'])->default('Indiferente');
            $table->enum('estado_cocina',['Buen estado', 'Necesita Reforma', 'Cocina de origen','Nueva','Reformada','Indiferente'])->default('Indiferente');
            $table->enum('estado_edificio',['Buen estado', 'Necesita Reforma', 'En ruina','Nuevo','Reformado','Rehabilitado','Indiferente'])->default('Indiferente');
            $table->enum('tipo_edificio',['Clásico', 'Diseño', 'Moderno','Premiado','Regio','Representativo','Señorial','Singular','Indiferente'])->default('Indiferente');
            $table->text('obs_calidades')->nullable();

            //SUPERFICIES Y DISTRIBUCION
            $table->integer('altura_desde')->nullable();
            $table->integer('altura_hasta')->nullable();
            $table->integer('hab2_desde')->nullable();
            $table->integer('hab2_hasta')->nullable();
            $table->integer('hab1_desde')->nullable();
            $table->integer('hab1_hasta')->nullable();
            $table->integer('suites_desde')->nullable();
            $table->integer('suites_hasta')->nullable();
            $table->integer('suputil_desde')->nullable();
            $table->integer('suputil_hasta')->nullable();
            $table->integer('supsalon_desde')->nullable();
            $table->integer('supsalon_hasta')->nullable();
            $table->integer('supcoci_desde')->nullable();
            $table->integer('supcoci_hasta')->nullable();
            $table->integer('supedif_desde')->nullable();
            $table->integer('supedif_hasta')->nullable();
            $table->integer('supterr_desde')->nullable();
            $table->integer('supterr_hasta')->nullable();
            $table->text('obs_superficies')->nullable();

            //CARPINTERIA
            $table->integer('armarios_desde')->nullable();
            $table->integer('armarios_hasta')->nullable();
            $table->enum('carp_exterior',['Aluminio', 'Aluminio Lacado', 'Hierro','Madera','Madera Barnizada','Madera Noble','Madera Pintada','Madera Teka','PVC','Indiferente'])->default('Indiferente');
            $table->enum('carp_interior',['Aluminio', 'Aluminio Lacado', 'Hierro','Madera','Madera Barnizada','Madera Embero','Madera Etimoe','Madera Haya','Madera Lacada','Madera Noble','Madera Pintada','Madera Sapelly','Madera Teka','PVC','Indiferente'])->default('Indiferente');
            $table->string('persianas')->nullable();
            $table->enum('puerta_principal',['Cuarterones', 'Hierro', 'Seguridad','Vidrio','Enrejada','Mazisa','Madera','Mixta','Normal','Reforzada','Indiferente'])->default('Indiferente');
            $table->enum('puertas_interiores',['Aluminio Lacado', 'Correderas', 'Cristal/Madera','Cuarterón','Embero','Etimoe','Inglesa','Nuevas','Rústicas','Sapelly','Tapizadas','Indiferente'])->default('Indiferente');
            $table->enum('ventanas',['Aluminio', 'Climalit', 'Cuarterones','Persianas','Rejas','Doble cristal','Madera','PVC','Indiferente'])->default('Indiferente');
            $table->text('obs_carpinteria')->nullable();

            //ACABADOS
            $table->enum('acabados_paredes',['Corcho', 'Estuco', 'Estuco Veneciano','Gotele','Madera','Moqueta','Papel','Acabado','Indiferente'])->default('Indiferente');
            $table->enum('paredes_banos',['Alicatado Ceramico', 'Gresite', 'Madera','Marmol','Pintura Plastica','Yeso','Indiferente'])->default('Indiferente');
            $table->enum('paredes_cocina',['Alicatado Ceramico', 'Madera','Marmol','Pintura Plastica','Yeso','Indiferente'])->default('Indiferente');
            $table->enum('suelos',['Baldosa', 'Baldosa Rustica','Ceramico','Corcho','Gres','Madera','Marmol','Tarima','Terrazo','Gresite','Linoleo','Moqueta','Mosaico','Porcelanato','Indiferente'])->default('Indiferente');
            $table->enum('suelos_banos',['Baldosa','Ceramico','Corcho','Gres','Madera','Marmol','Parquet','Terrazo','Gresite','Linoleo','Mosaico','Porcelanato','Indiferente'])->default('Indiferente');
            $table->enum('suelos_cocina',['Baldosa','Ceramico','Corcho','Gres','Madera','Marmol','Parquet','Terrazo','Gresite','Linoleo','Mosaico','Porcelanato','Indiferente'])->default('Indiferente');
            $table->enum('techo',['Altillos en Techo','Falso Techo','Cielo Raso','Techo de Bobeda','Lucido Yeso','Placas Registrables','Techos Altos','Artesonados','Madera','Indiferente'])->default('Indiferente');
            $table->enum('paredes',['Hormigon', 'Ladrillo', 'Pladur','Tabique'])->default('Ladrillo');
            $table->string('banneras')->nullable();
            $table->string('griferia')->nullable();
            $table->string('plato_duchas')->nullable();
            $table->string('sanitarios')->nullable();
            $table->text('obs_acabados')->nullable();
            
            // INSTALACIONES Y SUMINISTROS
            $table->enum('agua',[1,0,'Indiferente'])->default('Indiferente');
            $table->enum('gas',[1,0,'Indiferente'])->default('Indiferente');
            $table->enum('telefono',[1,0,'Indiferente'])->default('Indiferente');
            $table->enum('tvyfm',[1,0,'Indiferente'])->default('Indiferente');
            $table->enum('agua_caliente',['Gas Butano', 'Gas Natural', 'Gas Propano','No tiene Gas','Termo-Electrico','Indiferente'])->default('Indiferente');
            $table->enum('cocina',['Pequena','Americana','Amueblada','Con Armarios','Formica','Francesa','Kitchenette','Indiferente'])->default('Indiferente');
            $table->string('electricidad')->nullable();
            $table->enum('electrodomesticos',['Calentador de Agua', 'Cocina', 'Cocina de Gas','Cocina Electrica','Cocina Vitrocerámica','Congelador',
                'Equipo de Musica','Frigorifico','Hilo/Ambiente musical','Horno de Gas','Horno Eléctrico','Lavavajillas',
                'Muchos electrodomesticos','Secadora','Triturador Basura','Video','Indiferente'])->default('Indiferente');
            $table->enum('equipamientos',['Antena TV Colectiva', 'Antena TV Parabolica', 'Auditorio','Centralita Telefonos','Electricidad Instalada',
                'Hilo Musical/Musica Ambiental','Lineas Digitales','Lineas Telefono Analogicas','Megafonia','Musica Ambiente','Portero Electronico',
                'Red Datos','Red Datos Perimetral','Sala de Juntas','Indiferente'])->default('Indiferente');
            $table->string('fontaneria')->nullable();
            $table->string('iluminacion')->nullable();
            $table->enum('instalaciones',['Agua Propia', 'Aire Comprimido', 'Caja Fuerte','Camara Frigorifica','Contador Agua','Contador Gas',
                'Contador Luz','Deposito de Combustible','Deposito Residuos Contaminantes','Deposito Residuos Liquidos','Deposito Residuos Solidos',
                'Depuradora','Electricidad','Estanterias de Almacenaje','Extraccion Forzada de Aire','Foso','Gas','Grupo Electrogeno',
                'Iluminacion Patio Exterior','Lineas Telefonicas','Linea Cenital','Linea Lateral','Megafonia Interior','Plataforma Elevadora',
                'Polipasto','Puente Grua','Trasnformador','Indiferente'])->default('Indiferente');
            $table->enum('instalaciones_edificio',['Agua Comunitaria', 'Aspirotec', 'Bajante Recogida de Basuras','Bocas Incendio en Edificio',
                'Columna Seca','Electricidad Comunitaria','Escalera de Incendios','Extintores Edificio','Gas Butano','Gas Ciudad','Gas Propano','Indiferente'])->default('Indiferente');
            $table->enum('instalaciones_privadas',['Acometida de Agua pie parc', 'Acometida de Gas pie parc', 'Acometida de Luz pie parc','Barbacoa','Cuadras','Deposito de Agua','Embarcadero','Fosa Septica','Fronton','Glorieta/Cenador','Iluminacion Jardin','Invernadero','Pozo Propio','Riego Automatico','Sistemas Domoticos','Squash','Indiferente'])->default('Indiferente');
            $table->enum('refrigeracion',['Aacc Central', 'Aacc Consolas', 'Aacc Frio Calor','Aacc Solo Frio','Indiferente'])->default('Indiferente');
            
            $table->integer('interruptores')->nullable();
            $table->string('mecanismos')->nullable();
            $table->string('seguridad')->nullable();
            $table->integer('tomasdeagua')->nullable();
            $table->text('obs_instalaciones')->nullable();

            //DATOS ECONOMICOS
            $table->integer('gastoscom_desde')->nullable();
            $table->integer('gastoscom_hasta')->nullable();
            $table->enum('calidad_precio',['Buen Precio', 'Caro', 'Ganga','Muy Caro','Precio Justo','Indiferente'])->default('Indiferente');
            $table->enum('rentabilidad',[1,0,'Indiferente'])->default('Indiferente');
            $table->text('obs_datoseconomicos')->nullable();
            
            //FINCA
            $table->enum('construccion',['Bloque Granito', 'Bloque Toro', 'Hormigon Prefabricado','Ladrillo Obra Vista','Obra Metalica','Plancha Metalica','Indiferente'])->default('Indiferente');
            $table->enum('estilo_construccion',['Casa de Pueblo', 'Cortijo', 'Diseno Exclusivo','Diseno Moderno','Estilo Pirenaico','Estilo Clasico','Estilo Colonial','Estilo Neoclásico','Estilo Provenzal','Estilo Rustico','Masía','Molino','Otras','Pazo','Indiferente'])->default('Indiferente');
            $table->enum('estructura',['Hormigon', 'Madera', 'Metalica','Mixta','Vigas de Madera','Indiferente'])->default('Indiferente');
            $table->enum('portalyescalera',['Entrada servicio independiente', 'Portal noble', 'Portal señorial','Portal sin escalones','Portal y caja de escaleras','Indiferente'])->default('Indiferente');
            $table->enum('puerta_entrada',['Barrera Vigilada', 'Persiana', 'Persiana Automatica','Puerta Abatible Manual','Puerta Batiente Automatica','Puerta Batiente Manual','Puerta Manual','Indiferente'])->default('Indiferente');
            $table->integer('numfach_desde')->nullable();
            $table->integer('numfach_hasta')->nullable();
            $table->text('obs_finca')->nullable();
        
            //SITUACION Y ENTORNO
            $table->enum('calif_urbana',['Conservacion centro historico', 'Densificacion urbana intensiva', 'Densificacion urbana semi-intensiva','Industrial','Remodelacion privada','Remodelacion publica','Sub-zonas plurifamiliares','Sub-zonas unifamiliares','Sustitucion edificacion antigua','Verde privado protegido','Indiferente'])->default('Indiferente');
            $table->enum('cercania_a',['Campo de Golf', 'Playa', 'Lago','Mar','Pantano','Pistas de Esquí','Pueblo','Río','Primera Línea de Playa','Segunda Línea de Playa','Indiferente'])->default('Indiferente');
            $table->enum('elementos_comunitarios',['Antena colectiva', 'Antena parabolica', 'Club social','Fronton','Interfono','Piscina','Pista de tenis','Portero automatico','Sala de lavanderia','Solarium','Squash','Television por cable','Television por satelite','Terrado con tendedero','Indiferente'])->default('Indiferente');
            $table->enum('entorno',['Cerca zona comercial', 'Edificio aislado', 'Pocos vecinos','Zona alto nivel','Zona bien comunicada','Zona céntrica','Zona habitada permanentemente','Zona rural','Zona tranquila','Zona urbana','Indiferente'])->default('Indiferente');
            $table->enum('equipamientos_zonas',['Cerca campo golf', 'Cerca colegios', 'Cerca farmacia','Cerca guarderia','Cerca instalaciones colectivas','Cerca mercado','Cerca parque publico','Cerca supermercado','Cerca zona comercial','Indiferente'])->default('Indiferente');
            $table->enum('grado_urbanizacion',['Alto', 'Bajo', 'Medio','Muy Alto','Muy Bajo','Indiferente'])->default('Indiferente');
            $table->enum('sol',['Muy luminosos', 'Sol mañanas', 'Sol tardes','Sol todo el dia','Soleado','Indiferente'])->default('Indiferente');
            $table->enum('transportes_publicos',['Bien comunicado transp. publicos','Cerca aeropuerto','Cerca autobuses','Cerca estacion ferrocarril','Cerca estacion tren cercanias','Cerca metro','Cerca puerto','Cerca tranvia','Comunicaciones bien','Comunicaciones mal','Comunicaciones muy bien transp. publicos','Comunicaciones muy buenas','Comunicaciones regular','Indiferente'])->default('Indiferente');
            $table->enum('vistas',['Buenas vistas','Vistas a patio interior manzana','Vistas a calle','Vistas a campo de golf','Vistas a estacion de esqui','Vistas a la ciudad','Vistas a la montana','Vistas a la piscina','Vistas a la zona comunitaria','Vistas a la zona deportiva','Vistas a la zona verde','Vistas a mar y montana','Vistas a parque nacional','Vistas a parque publico','Vistas a patio interior ajardinado','Vistas a plaza','Vistas al lago','Vistas al mar','Vistas al puerto','Vistas al valle','Indiferente'])->default('Indiferente');
            $table->string('distancia_poblacion')->nullable();
            $table->text('obs_situacion')->nullable();

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
        Schema::drop('extrasdemandas');
    }
}
