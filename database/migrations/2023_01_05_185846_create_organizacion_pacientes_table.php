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
        // tabla en donde se hace la relación entre paciente y organización
        // util cuando se quiere filtrar por organizacion
        Schema::create('organizacion_pacientes', function (Blueprint $table) {
            $table->id();
            $table->string("paciente_id");  // identificador del paciente 
            $table->string("organizacion_id"); // identificador de la organización
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
        Schema::dropIfExists('organizacion_pacientes');
    }
};
