<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Archivoterceropagaduria extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
       
        //
        Schema::table('archivo_terceros', function (Blueprint $table) {

            $table->integer('pagaduria_id');

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
