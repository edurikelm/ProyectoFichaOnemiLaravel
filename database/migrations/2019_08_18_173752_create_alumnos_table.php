<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('rut');
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('curso');
            $table->string('salud');
            $table->string('vive');
            $table->string('apodrado1');
            $table->string('apodrado2');
            $table->string('pie');
            $table->string('social');
            $table->string('tipo');
            $table->string('repitencia');
            $table->string('diagnostico');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
