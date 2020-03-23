<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>

<style>
    .resumen {
        width: 95%;
        border: solid 2px black;
        padding: 5px;
    }

    .lista-estudiantes {
        width: 95%;
    }

    @page {
        margin-top: 100px;
        margin-right: 20px;
        margin-left: 40px;
        margin-bottom: 100px;
    }

    div {
        width: 200px;
        padding: 2px 0;
        margin: 0;
    }

    img{
        width: 100px;
    }

    #flotante {
        /*padre*/
        /* overflow: hidden; */
        width: 200px;
        align-items: center;
        float: left;
    }

    #flotante .A,
    #flotante .B,
    #flotante .C,
    #flotante .D,
    #flotante .E {
        /*hijos*/
        float: left;
        text-align: center;
        width: 19%;
    }

    #flotante2 {
        /*padre*/
        overflow: hidden;
        width: 1000px;
    }

    #flotante2 .A,
    #flotante2 .B,
    #flotante2 .C,
    #flotante2 .F {
        /*hijos*/
        float: left;
        text-align: center;
        width: 100px;
    }

    #flotante2 .D,
    #flotante2 .E {
        /*hijos*/
        float: left;
        text-align: center;
        width: 150px;
    }


    .borde {
        border: solid 1px black;
    }

</style>

<body>


    <img src="../public/img/colegio.jpg">
    {{-- <p><strong>Fecha: </strong>{{$today}}</p> --}}
    <h1 align="center">Ficha N&#176; {{$fichaAlumno->numFicha}}</h1>
    
    
    <div class="borde lista-estudiantes"></div>

    <div class=" lista-estudiantes"><strong>Nombre estudiante:</strong> {{$alumno->nombres}}
    </div>
    <div class=" lista-estudiantes"><strong>Entrevistador/es:</strong> {{$fichaAlumno->entrevistador}},
        {{$fichaAlumno->otro_entrevistador}}</div>
    <div class=" lista-estudiantes"><strong>Fecha Entrevista:</strong> {{$fichaAlumno->fecha_entrevista}}</div>
    <div class=" lista-estudiantes"><strong>Situaci&#243;n actual:</strong> {{$fichaAlumno->situacion_actual}}</div>
    <br>
    <h4>1.- Mot&#237;vo por el cual se reliza entrevista</h4>
    <div class="resumen">{{$fichaAlumno->motivo}}</div>
    <br>
    <h4>2.- Acuerdos tomados para llevar el caso</h4>
    <div class="resumen">{{$fichaAlumno->acuerdos}}</div>
    <br>
    <h4>3.- Observaciones al respecto</h4>
    <div class="resumen">{{$fichaAlumno->observaciones}}</div>
</body>

</html>
