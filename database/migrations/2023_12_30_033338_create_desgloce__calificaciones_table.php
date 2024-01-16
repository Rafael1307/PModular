<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesgloceCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desgloce__calificaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_materia')->references('id')->on('materias');
            $table->unsignedBigInteger('id_trimestre');
            $table->foreign('id_trimestre')->references('id')->on('trimestres');
            $table->integer('actividades');
            $table->integer('proyecto');
            $table->integer('desempeno');
            $table->integer('total');
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
        Schema::dropIfExists('desgloce__calificaciones');
    }
}
