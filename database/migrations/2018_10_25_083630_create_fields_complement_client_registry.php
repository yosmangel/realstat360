<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsComplementClientRegistry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('clientes', 'visitas')) ; //check whether users table has email column
        {
            Schema::table('clientes', function ($table) {
               $table->string('visitas')->after('comentarios')->nullable();
               $table->float('presupuesto')->after('visitas')->nullable();
               $table->string('medio_contacto')->after('presupuesto')->nullable();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function ($table) {
           $table->dropColumn(['visitas','presupuesto','medio_contacto']);
        });

    }
}
