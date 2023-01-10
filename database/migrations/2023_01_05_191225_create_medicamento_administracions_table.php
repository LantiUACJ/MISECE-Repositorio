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

            $table->string("paciente_id");
            $table->string("medicamento_id");
            $table->string("organizacion_id");
            $table->string("hash");

            $table->text("dosis_texto");
            $table->string("dosis_codigo");
            $table->string("dosis_visual");
            $table->string("via_sistema");
            $table->string("via_codigo");
            $table->string("via_visual");
            $table->string("via_texto");
            $table->string("periodicidad");

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
