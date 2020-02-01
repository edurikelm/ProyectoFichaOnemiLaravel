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
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('numFicha')->nullable();
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

            //Relacion
            $table->foreign('alumno_id')->references('id')->on('alumnos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users');
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
