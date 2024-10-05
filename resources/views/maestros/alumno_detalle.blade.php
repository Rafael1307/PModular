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
    <h2>Sugerencias para maestros</h2>
    @foreach ($sugerencias as $sugerencia) 
        <h3>{{$sugerencia}}</h3>
    @endforeach
</div>
<div class="container">
    <h1>Detalles de {{ $alumno->nombre }} {{ $alumno->apellido }}</h1>

    <h3>Calificaciones del Ciclo {{ $cicloActual->nombre }}</h3>

    @if(empty($calificacionesPorTrimestre))
        <p>No hay calificaciones para este ciclo.</p>
    @else
        @foreach($calificacionesPorTrimestre as $trimestre => $calificaciones)
            <h4>{{ $trimestre }}</h4>
            @if($calificaciones->isEmpty())
                <p>No hay calificaciones para este trimestre.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Materia</th>
                            <th>Calificación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($calificaciones as $calificacion)
    <tr>
        <td>{{  $materiasList[$calificacion->materia->materia]  ?? 'Materia desconocida' }}</td>
        <td>{{ $calificacion->calificacion }}</td>
    </tr>
@endforeach
                    </tbody>
                </table>
            @endif
        @endforeach
    @endif

    <h3>Notas del Alumno</h3>
    @if($notas->isEmpty())
        <p>No hay notas para este alumno.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Asunto</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notas as $nota)
                    <tr>
                        <td>{{ $nota->asunto }}</td>
                        <td>{{ $nota->descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
