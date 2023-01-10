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
        Schema::create('alergias', function (Blueprint $table) {
            $table->id();
            $table->string("paciente_id");
            $table->string("organizacion_id");
            $table->string("hash");

            $table->string("criticidad");
            $table->string("codigo_sistema");
            $table->string("codigo");
            $table->string("codigo_visual");
            $table->string("texto");
            $table->string("estatus");
            $table->string("fecha_de_registro");
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
        Schema::dropIfExists('alergias');
    }
};
