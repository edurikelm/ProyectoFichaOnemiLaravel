<?php

use Illuminate\Database\Seeder;
use App\Alumno;
use App\Ficha;
use Carbon\Carbon;

class AlumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Alumno::truncate(); // Evita duplicar datos

        $alumno = new Alumno();
        $alumno->nombres = "Eduardo Albert";
        $alumno->apellidos = "Riquelme Mayorga";
        $alumno->rut = "16.975.255-9";
        $alumno->direccion = "Jose Muñoz Hermosilla 252";
        $alumno->fecha_nacimiento = "1988-07-08";
        $alumno->telefono = "979579507";
        $alumno->curso = "4D";
        $alumno->salud = "Isapre";
        $alumno->vive = "Padre";
        $alumno->apodrado1 = "Juan";
        $alumno->apodrado2 = "Maria";
        $alumno->pie = "No";
        $alumno->social = "SENAME";
        $alumno->tipo = "Nuevo";
        $alumno->repitencia = "No";
        $alumno->diagnostico = "Diagnostico 1";
        $alumno->save();

        $alumno = new Alumno();
        $alumno->nombres = "Victor Eduardo";
        $alumno->apellidos = "Riquelme Varas";
        $alumno->rut = "6.888.787-9";
        $alumno->direccion = "Pobl. las nieves block 6 dpto 22";
        $alumno->fecha_nacimiento = "1990-11-03";
        $alumno->telefono = "96992369";
        $alumno->curso = "5A";
        $alumno->salud = "Fonasa";
        $alumno->vive = "Madre";
        $alumno->apodrado1 = "Mario";
        $alumno->apodrado2 = "Pedro";
        $alumno->pie = "No";
        $alumno->social = "CEPIJ";
        $alumno->tipo = "Extranjero";
        $alumno->repitencia = "Si";
        $alumno->diagnostico = "Diagnostico 2";
        $alumno->save();

        Ficha::truncate();

        $ficha = new Ficha();
        $ficha->usuario = 'Eduardo Riquelme';
        $ficha->numFicha = 1;
        $ficha->alumno_id = 1;
        $ficha->entrevistador = 'Gladys Mayorga';
        $ficha->otro_entrevistador = 'Victor Riquelme';
        $ficha->entrevistado = 'Madre';
        $ficha->situacion_actual = 'Cerrado';
        $ficha->motivo = 'Derivación a psicóloga ';
        $ficha->acuerdos = 'Se informa de entrevista realizada y de necesidad de no transmitir a estudiante un problema con su orientación sexual como motivo de derivación. 
        Se aborda derivación como acompañamiento a proceso de adaptación (por ser estudiante extranjero)';
        $ficha->observaciones = 'Se solicita compartir información con profesora Rosario. ';
        $ficha->fecha_entrevista = '2019-11-03';
        $ficha->save();



        

        
    }
}
