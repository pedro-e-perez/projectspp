<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTercero extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //

        Schema::create('Tercero', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->string('NumeroId');
            $table->enum('TipoDoc', ['CC', 'CE', 'TI']);
            $table->string('Telefonos')->nullable();
            $table->string('Email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
