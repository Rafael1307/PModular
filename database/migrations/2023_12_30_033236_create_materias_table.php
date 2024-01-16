<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('materia');
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos');
            $table->unsignedBigInteger('id_maestro');
            $table->foreign('id_maestro')->references('id')->on('maestros');
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
        Schema::dropIfExists('materias');
    }
}
