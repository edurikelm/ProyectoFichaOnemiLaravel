<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    public function alumno(){

        return $this->belongsTo(Alumno::class); //varias fichas pertenecen a un alumno
    }
}
