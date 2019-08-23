<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;

class AlumnoController extends Controller
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
    

    public function index()
    {
        $alumnos = Alumno::orderBy('id','DESC')->paginate(5);
        return view('pages.alumnos.lista', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.alumnos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno = new Alumno();
        $alumno->nombres = $request->nombres;
        $alumno->apellidos = $request->apellidos;
        $alumno->rut = $request->rut;
        $alumno->direccion= $request->direccion;
        $alumno->fecha_nacimiento= $request->fecha_nacimiento;
        $alumno->telefono= $request->telefono;
        $alumno->curso= $request->curso;
        $alumno->salud= $request->salud;
        $alumno->vive= $request->vive;
        $alumno->apodrado1= $request->apodrado1;
        $alumno->apodrado2= $request->apodrado2;
        $alumno->pie= $request->pie;
        $alumno->social= $request->social;
        $alumno->tipo= $request->tipo;
        $alumno->repitencia= $request->repitencia;
        $alumno->diagnostico= $request->diagnostico;
        $alumno->save();

        return back()->with('mensaje', 'Alumno Agregado!');

    
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
        //
    }
}
