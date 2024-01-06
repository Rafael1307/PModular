<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis__grupos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('grupo');
            $table->unsignedBigInteger('id_ciclo');
            $table->foreign('id_ciclo')->references('id')->on('ciclos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sis__grupos');
    }
}
