<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('alumno_id');
            $table->text('usuario');
            $table->integer('numFicha');
            $table->timestamp('fecha')->nullable();
            $table->string('entrevistador');
            $table->string('otro_entrevistador');
            $table->string('entrevistado');
            $table->string('situacion_actual');
            $table->text('motivo');
            $table->text('acuerdos');
            $table->text('observaciones');
            $table->date('fecha_entrevista');
            $table->time('hora_entrevista')->nullable();

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
        Schema::dropIfExists('fichas');
    }
}
