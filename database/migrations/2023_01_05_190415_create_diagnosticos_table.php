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
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            /* Se quedará este recurso, ya que pudiera ser requerido más adelante */
            $table->string("paciente_id");// identificador del paciente 
            $table->string("organizacion_id");// identificador de la organización
            $table->string("encuentro_id");// identificador de la visita (encuentro)
            
            $table->string("codigo"); // codigo del diagnóstico (generalmente será un texto con la descripción, ej. Toz)
            $table->string("fecha_efectiva"); // fecha del diagnóstico
            
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
        Schema::dropIfExists('diagnosticos');
    }
};
