<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use App\Ficha;
use App\Alumno;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function imprimirPdf($id){
        $fichaAlumno = Ficha::findOrFail($id);
        $alumno = Alumno::findOrFail($fichaAlumno->alumno_id);
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('pages.pdf.pdf', compact('today', 'fichaAlumno', 'alumno'));
        return $pdf->stream('ficha.pdf', array("Attachment"=>0));
    }

}
