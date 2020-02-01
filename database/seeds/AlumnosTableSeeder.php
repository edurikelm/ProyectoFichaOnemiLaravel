<?php

use Illuminate\Database\Seeder;
use App\Alumno;
use App\Ficha;
use App\User;
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

        factory(User::class, 3)->create();

        // Alumno::truncate(); // Evita duplicar datos

        $alumno = new Alumno();
        $alumno->nombres = "Eduardo Alberto";
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

        // Ficha::truncate();

        $ficha = new Ficha();
        $ficha->numFicha = 1;
        $ficha->alumno_id = 1;
        $ficha->user_id = 1;
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

        $ficha = new Ficha();
        $ficha->numFicha = 2;
        $ficha->alumno_id = 1;
        $ficha->user_id = 3;
        $ficha->entrevistador = 'Gladys Mayorga';
        $ficha->otro_entrevistador = '';
        $ficha->entrevistado = 'Sandra Daza';
        $ficha->situacion_actual = 'Seguimiento';
        $ficha->motivo = 'Intervención psicológica/ Derivación a psicóloga ';
        $ficha->acuerdos = 'Se aborda necesidad de madre de tener orientaciones sobre manejo de identidad de género y orientación sexual de su hijo. Se entrega información sobre estas situaciones y orientaciones sobre a quienes acudir o informar situaciones de discriminación (si ocurrieran).
        Se acuerda realizar próxima entrevista en un mes, mientras se trabaja en vínculo con estudiante. ';
        $ficha->observaciones = 'Durante mes de mayo no se pudo citar a apoderada, ni a estudiante por contingencias. No se han reportado a psicóloga dificultades en inclusión de estudiante en establecimiento. 
        Pendiente: continuar proceso de vinculación con estudiante y abordar tema de orientación sexual. 
        Pendiente: citar a apoderada. ';
        $ficha->fecha_entrevista = '2019-05-03';
        $ficha->save();



        

        
    }
}
