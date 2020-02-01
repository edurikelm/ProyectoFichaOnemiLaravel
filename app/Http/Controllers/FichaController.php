<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ficha;
use App\Alumno;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $fichasAlumno = Ficha::where('alumno_id', $id)->paginate(5);
        $nombreAlumno = Alumno::findOrFail($id);
        return view('pages.fichas.lista', compact('fichasAlumno','nombreAlumno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ficha = new Ficha();
        $ficha->alumno_id = $request->alumno_id;
        $ficha->user_id = $request->user_id;
        
        $ficha->entrevistador = $request->nombre1;
        $ficha->otro_entrevistador = $request->otro;
        $ficha->entrevistado = $request->entrevistado;
        $ficha->situacion_actual = $request->actual;
        $ficha->motivo = $request->motivo;
        $ficha->acuerdos = $request->acuerdos;
        $ficha->observaciones = $request->obs;
        $ficha->fecha_entrevista = $request->fecha;
        $ficha->hora_entrevista = $request->hora;
        $ficha->save();

        return back()->with('mensaje', 'Ficha Agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fichaEliminar = Ficha::findOrFail($id);
        $fichaEliminar->delete();

        return back()->with('mensaje', 'Ficha eliminada con exito.');

    }
}
