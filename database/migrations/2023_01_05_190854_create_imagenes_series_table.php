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
        Schema::create('imagenes_series', function (Blueprint $table) {
            $table->id();

            $table->string("imagenes_id");
            $table->string("serie_uid");
            $table->string("modalidad_sistema");
            $table->string("modalidad_codigo");
            $table->string("modalidad_visual");
            $table->string("instancia_uid");
            $table->string("instancia_sopclass_sistema");
            $table->string("instancia_sopclass_codigo");
            $table->string("instancia_sopclass_visual");

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
        Schema::dropIfExists('imagenes_series');
    }
};
