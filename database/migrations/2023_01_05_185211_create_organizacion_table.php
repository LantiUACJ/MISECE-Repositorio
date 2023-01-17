<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizacions', function (Blueprint $table) {
            $table->id();
            $table->string("nombre"); // nombre de la organización de salid
            $table->string("estado_dir"); // estado en donde esta ubicado fisicamente la organización de salud
            $table->string("ciudad_dir"); // ciudad en donde esta ubicado fisicamente la organización de salud
            $table->string("cp_dir"); // codigo postal en donde esta ubicado fisicamente la organización de salud
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
        Schema::dropIfExists('organizacion_direccions');
    }
};
