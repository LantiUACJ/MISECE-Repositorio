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
        Schema::create('paciente_direccions', function (Blueprint $table) {
            $table->id();
            $table->string("paciente_id");
            $table->string("tipo_dir");
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
        Schema::dropIfExists('paciente_direccions');
    }
};
