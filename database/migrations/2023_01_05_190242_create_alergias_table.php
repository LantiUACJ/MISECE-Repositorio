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
            $table->string("paciente_id"); // identificador del paciente 
            $table->string("organizacion_id"); // identificador de la organización
            $table->string("encuentro_id"); // identificador de la visita (encuentro)
            $table->string("hash"); // hash de todos los datos de esta tabla (menos hash y timestamps[created_at, updated_at])

            $table->string("estatus"); // estado de la alergia
            $table->string("tipo"); // tipo de alergia (alergia o intolerancia)
            $table->string("codigo"); // codigo de la alergia (generalmente será un texto con el nombre de la alergia ej. cacahuate)
            $table->string("criticidad"); // Que tan critico es esa alergia (generalmente será N)
            $table->string("fecha_de_registro"); // fecha en la cual se registro esta alergia en el sistema

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
