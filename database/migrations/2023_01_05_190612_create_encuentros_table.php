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
        Schema::create('encuentros', function (Blueprint $table) {
            $table->id();
            $table->string("paciente_id");// identificador del paciente 
            $table->string("organizacion_id");// identificador de la organización
            $table->string("hash");// hash de todos los datos de esta tabla (menos hash y timestamps[created_at, updated_at])
            
            $table->string("estatus"); // estado de la visita
            $table->string("motivo"); // motivo por la cual el paciente fue a consulta al medico
            
            $table->string("periodo_inicio"); // fecha de inicio de la consulta medica
            $table->string("periodo_fin"); // fecha de final de la consulta medica
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
        Schema::dropIfExists('encuentros');
    }
};
