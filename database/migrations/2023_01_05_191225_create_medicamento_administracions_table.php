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
        Schema::create('medicamento_administracions', function (Blueprint $table) {
            $table->id();
            /* 
                Este recurso es utilizado para recetar medicamentos a los pacientes
            */

            $table->string("paciente_id");// identificador del paciente 
            $table->string("organizacion_id");// identificador de la organización
            $table->string("encuentro_id");// identificador de la visita (encuentro)
            $table->string("hash");// hash de todos los datos de esta tabla (menos hash y timestamps[created_at, updated_at])

            $table->text("dosis_texto"); // es un texto libre en donde se describe el consumo del medicamento (ej. tomar 2 pastillas de paracetamol cada 6 horas)
            $table->string("estatus"); // estado de la receta medica
            $table->string("intent"); // intención de la receta medica
            $table->string("medicamento"); // que medicamento se está recetando

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
        Schema::dropIfExists('medicamento_administracions');
    }
};
