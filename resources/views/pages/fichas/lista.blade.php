@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#nuevaEntrevista">Nueva
                entrevista</a>
            <h4 class="m-0 font-weight-bold text-primary text-center">Lista de entrevistas del alumno:
                {{$nombreAlumno->nombres}} </h4>
        </div>
        <div class="card-body">
            @if ( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @elseif(session('eliminar'))
            <div class="alert alert-danger">{{ session('eliminar') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Situación Actual</th>
                            <th>Entrevistador/es</th>
                            <th>Entrevistado/a</th>
                            <th>Detalle</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichasAlumno as $item)
                        <tr>
                            <th scope="row">
                                {{ $item->id }}
                            </th>
                            <th>
                                {{ $item->created_at }}
                            </th>
                            <th>
                                {{ $item->situacion_actual }}
                            </th>
                            <th>
                                {{ $item->entrevistador }}
                            </th>
                            <th>
                                {{ $item->entrevistado }}
                            </th>
                            <th>
                                <a href="" class="btn btn-sm btn-info btn-block" data-toggle="modal"
                                    data-target="#modalVer{{$item->id}}">Ver</a>
                                <a href="{{route('imprimir', $item->id)}}" class="btn btn-sm btn-block" target="blank">PDF</a>
                            </th>
                            <th>

                                <a href="" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editarEntrevista{{$item->id}}">Editar</a>
                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#myModal{{$item->id}}">Eliminar</a>
                            </th>

                            {{-- Modal eliminar Ficha --}}
                            <div id="myModal{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Contenido del modal -->
                                    <div class="modal-content">
                                        <input type="text" hidden value="{{$item->id}}">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12 grid-margin stretch-card">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h1 class="card-title"> ¿Desea eliminar este registro ?
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('fichas.eliminar', $item)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <button type="submit" name="btn_borrar_alumno"
                                                    class="btn btn-success">Aceptar</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal ver Ficha --}}
                            <div id="modalVer{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Contenido del modal -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Detalles entrevista</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="" class="mt-3">Motivo:</label>
                                                    <ul>
                                                        <li>{{$item->motivo}}</li>
                                                    </ul>
                                                    <label for="" class="mt-3">Acuerdos/Compromisos:</label>
                                                    <ul>
                                                        <li>{{$item->acuerdos}}</li>
                                                    </ul>
                                                    <label for="" class="mt-3">Observaciones:</label>
                                                    <ul>
                                                        <li>{{$item->observaciones}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal Editar Entrevista --}}

                            <div class="modal fade" id="editarEntrevista{{$item->id}}" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4>Editar ficha</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{route('fichas.update', $item->id)}}" method="POST"
                                            class="form-group">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" hidden name="alumno_id" id=""
                                                            value="{{$item->alumno_id}}">
                                                        <input type="text" hidden name="numFicha" id=""
                                                            value="{{$item->numFicha}}">
                                                        <input type="text" hidden name="user_id" id=""
                                                            value="{{ Auth::user()->id }}">
                                                        <label for="">Entrevistadores</label>
                                                        <select name="nombre1" id="nombre1" class="form-control">
                                                            <option value="{{$item->entrevistador}}">
                                                                {{$item->entrevistador}}</option>
                                                            <option value="María Paz Sepúlveda">María Paz Sepúlveda
                                                            </option>
                                                            <option value="Cecilia Castro">Cecilia Castro</option>
                                                            <option value="Gladys Mayorga">Gladys Mayorga</option>
                                                            <option value="Inspectoría">Inspectoría</option>
                                                        </select>
                                                        <label for="" class="mt-3">Otro entrevistador(Opcional)</label>
                                                        <input type="text" name="otro" id="" class="form-control"
                                                            value="{{$item->otro_entrevistador}}">
                                                        <label for="" class="mt-3">Entrevistado</label>
                                                        <input type="text" name="entrevistado" id=""
                                                            class="form-control" value="{{$item->entrevistado}}">
                                                        <label for="" class="mt-3">Motivo</label>
                                                        <input type="text" name="motivo" id="" class="form-control"
                                                            value="{{$item->motivo}}">
                                                        <label for="" class="mt-3">Situación Actual</label>
                                                        <select name="actual" id="" class="form-control">
                                                            <option value="{{$item->situacion_actual}}">
                                                                {{$item->situacion_actual}}</option>
                                                            <option value="Pendiente">Pendiente</option>
                                                            <option value="En proceso">En proceso</option>
                                                            <option value="Seguimiento">Seguimiento</option>
                                                            <option value="Cerrado">Cerrado</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="">Fecha</label>
                                                                <input type="date" name="fecha" id=""
                                                                    class="form-control"
                                                                    value="{{$item->fecha_entrevista}}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Hora</label>
                                                                <input type="time" name="hora" id=""
                                                                    class="form-control"
                                                                    value="{{$item->hora_entrevista}}">
                                                            </div>
                                                        </div>
                                                        <label for="" class="mt-3">Acuerdos/Compromisos</label>
                                                        <textarea name="acuerdos" id="" cols="30" rows="4"
                                                            class="form-control">{{$item->acuerdos}}</textarea>
                                                        <label for="" class="mt-3">Observaciones</label>
                                                        <textarea name="obs" id="" cols="30" rows="4"
                                                            class="form-control">{{$item->observaciones}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Aceptar</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Modal Agregar Entrevista --}}

            <div class="modal fade" id="nuevaEntrevista" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Entrevista N° {{$numFicha->numFicha + 1}}</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <form action="/fichas" method="POST" class="form-group">
                            @csrf
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" hidden name="numFicha" id=""
                                            value="{{$numFicha->numFicha + 1}}">
                                        <input type="text" hidden name="alumno_id" id="" value="{{$nombreAlumno->id}}">
                                        <input type="text" hidden name="user_id" id="" value="{{ Auth::user()->id }}">
                                        <label for="">Entrevistadores</label>
                                        <select name="nombre1" id="nombre1" class="form-control">
                                            <option value="">-- Seleccione --</option>
                                            <option value="María Paz Sepúlveda">María Paz Sepúlveda
                                            </option>
                                            <option value="Cecilia Castro">Cecilia Castro</option>
                                            <option value="Gladys Mayorga">Gladys Mayorga</option>
                                            <option value="Inspectoría">Inspectoría</option>
                                        </select>
                                        <label for="" class="mt-3">Otro entrevistador(Opcional)</label>
                                        <input type="text" name="otro" id="" class="form-control">
                                        <label for="" class="mt-3">Entrevistado</label>
                                        <input type="text" name="entrevistado" id="" class="form-control">
                                        <label for="" class="mt-3">Motivo</label>
                                        <input type="text" name="motivo" id="" class="form-control">
                                        <label for="" class="mt-3">Situación Actual</label>
                                        <select name="actual" id="" class="form-control">
                                            <option value="">--Selecionar--</option>
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="En proceso">En proceso</option>
                                            <option value="Seguimiento">Seguimiento</option>
                                            <option value="Cerrado">Cerrado</option>
                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Fecha</label>
                                                <input type="date" name="fecha" id="" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Hora</label>
                                                <input type="time" name="hora" id="" class="form-control">
                                            </div>
                                        </div>
                                        <label for="" class="mt-3">Acuerdos/Compromisos</label>
                                        <textarea name="acuerdos" id="" cols="30" rows="4"
                                            class="form-control"></textarea>
                                        <label for="" class="mt-3">Observaciones</label>
                                        <textarea name="obs" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Aceptar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
