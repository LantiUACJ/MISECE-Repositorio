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

            $table->string("paciente_id");
            $table->string("organizacion_id");
            $table->string("hash");
            
            $table->string("codigo_sistema");
            $table->string("codigo_visual");
            $table->string("codigo");
            $table->string("codigo_texto");
            $table->string("cantidad_unidad");
            $table->string("cantidad_valor");
            $table->string("cantidad_codigo");
            $table->string("cantidad_sistema");
            $table->string("cantidad_texto");
            $table->string("fecha_efectiva");
            $table->string("estatus");
            $table->string("tipo_valor");
            $table->string("cantidad_visual");

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
