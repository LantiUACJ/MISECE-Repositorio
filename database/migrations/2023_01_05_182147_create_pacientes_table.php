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
            $table->string("identifier");
            $table->string("fecha_nac");
            $table->string("estado_nac");
            $table->string("nacionalidad");
            $table->string("sexo");
            $table->string("etnia");
            $table->string("genero");
            $table->string("estado_dir");
            $table->string("ciudad_dir");
            $table->string("cp_dir");
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
