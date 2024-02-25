@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Calificaciones {{$grupo->grupo}}</h1>

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
                    @php
                        $var = "N/A";
                    @endphp

                    @foreach($alumno->calificaciones as $calificacion)
                        @if($calificacion->id_materia == $materia->id && $calificacion->id_trimestre == $trimestre_id)
                            @php
                                $var = $calificacion->calificacion;
                            @endphp
                        @endif
                    @endforeach

                    <td>{{$var}}</td>
                @endforeach
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

@endsection