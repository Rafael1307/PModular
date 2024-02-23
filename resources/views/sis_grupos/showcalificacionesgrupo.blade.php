@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Calificaciones {{$sisGrupo->grupo}}</h1>

        <table border="1" class="table">
            <thead>
                <tr>
                    <th >Alumnos</th>
                    @foreach($materias as $materia)
                        <th style="writing-mode: vertical-lr; transform: rotate(180deg);">{{ $materiasList[$materia->materia] }}</th>
                    @endforeach
                </tr>

            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->apellido}} {{$alumno->nombre}}</td>
                    @foreach($materias as $materia)
                    @foreach($alumno->calificaciones as $calificacion)
                        <td>{{($calificacion->materia == $materia) ?(($calificacion->trimestre == $trimestre_id)? $calificacion->calificacion : "N/A"):"N/A"}}</td>
                    @endforeach
                    @endforeach
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

@endsection