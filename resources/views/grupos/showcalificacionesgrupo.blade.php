@extends('layouts.app')

@section('content')
<style>
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
        .table {
            background-color: #424549;
            color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead th {
            background-color: #424549;
            border-bottom: none;
            padding: 15px;
            color: white;
        }
        .table td {
            background-color: #424549;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }
        .table tr {
            display: flex;
            margin-bottom: 5px;
        }
        .table td:nth-child(1) { flex: 2; }
        .table td:nth-child(2) { flex: 1; }
        .table td:nth-child(3) { flex: 1; }
        .btn-primary, .btn-info, .btn-warning {
            margin: 2px;
        }
    </style>
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