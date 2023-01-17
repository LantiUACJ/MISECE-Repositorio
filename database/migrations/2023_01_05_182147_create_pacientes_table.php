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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string("identifier"); // identificador del paciente en el sistema (hash de curp)
            $table->string("fecha_nac"); // fecha de nacimiento del paciente
            $table->string("estado_nac"); // estado de nacimiento del paciente
            $table->string("nacionalidad"); // nacionalidad del paciente
            $table->string("sexo"); // sexo del paciente
            $table->string("etnia"); // etnia del paciente
            $table->string("genero"); // genero del paciente
            $table->string("estado_dir"); // estado en donde tiene su recidencia el paciente
            $table->string("ciudad_dir"); // ciudad en donde tiene su recidencia el paciente
            $table->string("cp_dir"); // codigo postal en donde tiene su recidencia el paciente
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
        Schema::dropIfExists('patients');
    }
};
