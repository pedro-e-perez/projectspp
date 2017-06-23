<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAechivoTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Archivo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Extension');
            $table->string('Tamano');
            $table->string('RutaGuardado')->nullable();
            $table->string('NombreGuardado')->nullable();
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
        //
    }
}
