@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ingreso Nuevo Alumno</h6>
        </div>
        <div class="card-body">
            @if ( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}</div>
            @endif
            <form id="formAlumno" class="form-sample" method="POST" action="/alumnos">
                @csrf
                <legend>Añada un contacto <span>Todos los campos son obligatorios</span></legend>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Rut</label>
                            <input id="rut" name="rut" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <input id="nombres" name="nombres" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <input id="apellidos" name="apellidos" type="text" class="form-control"
                                >
                        </div>
                        <div class="form-group">
                            <label for="">Fecha nacimiento</label>
                            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control"
                                >
                        </div>
                        <div class="form-group">
                            <label for="">Dirección</label>
                            <input id="direccion" name="direccion" type="text" class="form-control"
                                >
                        </div>
                        <div class="form-group">
                            <label for="">Previsión de salud</label>
                            <select class="form-control" name="salud" >
                                <option value="" selected="selected">-- Seleccione --</option>
                                <option value="Isapre">Isapre</option>
                                <option value="Fonasa">Fonasa</option>
                                <option value="Capredena">Capredena</option>
                                <option value="Subsidio familiar">Subsidio familiar</option>
                                <option value="Prais">Prais</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Vive con</label>
                            <select class="form-control" name="vive" >
                                <option value="">-- Seleccione --</option>
                                <option value="Madre y Padre">Madre y Padre</option>
                                <option value="Madre">Madre</option>
                                <option value="Padre">Padre</option>
                                <option value="Abuelos">Abuelos</option>
                                <option value="Otro familiar">Otro familiar</option>
                                <option value="Institución">Institución</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Institución Protección social</label>
                            <select class="form-control" name="social" >
                                <option value="">-- Seleccione --</option>
                                <option value="SENAME">SENAME</option>
                                <option value="CEPIJ">CEPIJ</option>
                                <option value="Tribunales">Tribunales</option>
                                <option value="COSAM">COSAM</option>
                                <option value="OPCION">OPCION</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Apodrado 1</label>
                            <input id="apodrado1" name="apodrado1" type="text" class="form-control"
                                >
                        </div>
                        <div class="form-group">
                            <label>Apodrado 2</label>
                            <input id="apodrado2" name="apodrado2" type="text" class="form-control"
                                >
                        </div>
                        <div class="form-group">
                            <label>Fono/Contacto</label>
                            <input id="telefono" name="telefono" type="text" class="form-control"
                                >
                        </div>
                        <div class="form-group">
                            <label for="">PIE</label>
                            <select class="form-control" name="pie" >
                                <option value="">-- Seleccione --</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Diagnostico</label>
                            <input id="diagnostico" name="diagnostico" type="text" class="form-control"
                                >

                        </div>

                        <div class="form-group">
                            <label for="">Tipo de estudiante</label>
                            <select class="form-control" name="tipo" >
                                <option value="">-- Seleccione --</option>
                                <option value="Nuevo">Nuevo</option>
                                <option value="Extranjero">Extranjero</option>
                                <option value="De la escuela">De la escuela</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Curso</label>
                            <input id="curso" name="curso" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="">Repitencia</label>
                            <select class="form-control" name="repitencia" >
                                <option value="">-- Seleccione --</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <button id="send" class="btn btn-success btn-lg btn-block " name="btn_crear_alumno"
                                    type="submit">Registrar
                                    Alumno</button>
                            </div>
                            <div class="col-lg-6">
                                <input type="button" class="btn btn-lg btn-block btn-warning" value="Limpiar campos"
                                    onclick="Limpiar();" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
