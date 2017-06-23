<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerceroEnumtipodoc extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('Tercero', function (Blueprint $table) {
            $table->dropColumn('TipoDoc');
        });
        Schema::table('Tercero', function (Blueprint $table) {
            $table->enum('TipoDoc', ['CC', 'CE', 'TI', 'RC', 'NI', 'PB']);
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
