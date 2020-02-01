@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/alumnos/create" class="btn btn-success btn-sm">Nuevo Alumno</a>
            <h4 class="m-0 font-weight-bold text-primary text-center">Lista de Alumnos </h4>
        </div>
        <div class="card-body">
            @if ( session('mensaje') )
            <div class="alert alert-danger">{{ session('mensaje') }}
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
                            <th>Rut</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Curso</th>
                            <th>Fichas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $item)
                        <tr>
                            <th scope="row">
                                {{ $item->id }}
                            </th>
                            <th>
                                {{ $item->rut }}
                            </th>
                            <th>
                                {{ $item->nombres }}
                            </th>
                            <th>
                                {{ $item->apellidos }}
                            </th>
                            <th>
                                {{ $item->curso }}
                            </th>
                            <th>
                                <a href="{{route('fichas.lista', $item)}}" class="btn btn-sm btn-primary">Ver fichas</a>
                            </th>
                            <th>
                                <a href="" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{route('alumnos.editar', $item)}}" class="btn btn-sm btn-warning">Editar</a>
                                <a href="" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#myModal{{$item->id}}">Eliminar</a>
                            </th>
                            <div id="myModal{{$item->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Contenido del modal -->
                                    <div class="modal-content">
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
                                            <form action="{{route('alumnos.eliminar', $item)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="" name="id" value="{{$item}}">
                                                <button type="submit" name="btn_borrar_alumno"
                                                    class="btn btn-success">Si</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
@endsection
