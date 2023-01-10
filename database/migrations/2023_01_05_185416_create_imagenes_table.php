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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            
            $table->string("paciente_id");
            $table->string("encuentro_id");
            $table->string("estatus");
            $table->string("id_sistema_urn");
            $table->string("id_valor_urnoid");
            $table->string("codigo_texto");
            $table->string("fecha_inicio");

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
        Schema::dropIfExists('imagenes');
    }
};
