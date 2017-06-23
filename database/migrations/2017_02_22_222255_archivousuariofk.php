<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Archivousuariofk extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('archivo_terceros', function (Blueprint $table) {
            $table->integer('tercero_id')->unsigned()->change();

            $table->foreign('tercero_id')->references('id')->on('tercero');

           // $table->foreign('archivo_id')->references('id')->on('archivo');
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
