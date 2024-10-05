@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sugerencias para maestros</h2>
    @foreach ($sugerencias as $sugerencias) 
        <h3>{{$sugerencias->name}}</h3>
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
