<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('grupo');
            $table->string('grado');
            $table->string('turno');
            $table->unsignedBigInteger('id_asesor');
            $table->foreign('id_asesor')->references('id')->on('maestros');
            $table->unsignedBigInteger('id_ciclo');
            $table->foreign('id_ciclo')->references('id')->on('ciclos');
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
