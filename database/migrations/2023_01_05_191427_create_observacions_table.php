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
        Schema::create('observacions', function (Blueprint $table) {
            $table->id();

            $table->string("paciente_id"); // identificador del paciente 
            $table->string("organizacion_id"); // identificador de la organización
            $table->string("encuentro_id"); // identificador de la visita (encuentro)
            $table->string("hash"); // hash de todos los datos de esta tabla (menos hash y timestamps[created_at, updated_at])
            
            $table->string("categoria"); // que clase de observación es (ej. exploración física)
            $table->string("codigo"); // a que hace referencia esa observacion (ej. Peso)
            $table->string("valor"); // que valor tiene (ej. 66 kg)

            $table->string("fecha_efectiva"); // fecha en la cual se realizo la observacion
            $table->string("estatus"); // estado de la observacion

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
        Schema::dropIfExists('observacions');
    }
};
