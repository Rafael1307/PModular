<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('status');
            $table->unsignedBigInteger('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->unsignedBigInteger('id_fecha');
            $table->foreign('id_fecha')->references('id')->on('dias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
