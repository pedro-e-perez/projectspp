<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Archivousuariofkarchivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('archivo_terceros', function (Blueprint $table) {
            $table->integer('archivo_id')->unsigned()->change();

            $table->foreign('archivo_id')->references('id')->on('tercero');

           // $table->foreign('archivo_id')->references('id')->on('archivo');
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
