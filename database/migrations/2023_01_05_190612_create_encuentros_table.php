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
            $table->string("paciente_id");
            $table->string("organizacion_id");
            $table->string("hash");
            
            $table->string("estatus");
            $table->string("sistema");
            $table->string("codigo");
            $table->string("visual");
            $table->string("periodo_inicio");
            $table->string("periodo_fin");
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
