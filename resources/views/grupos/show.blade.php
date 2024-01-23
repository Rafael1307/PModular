@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Grupo: {{ $grupo->grupo }}</h1>

        <p>Grado: {{ $grupo->grado }}</p>
        <p>Turno: {{ $grupo->turno }}</p>
        <p>Asesor: {{ $grupo->asesor->nombre }} {{ $grupo->asesor->apellido }}</p>
        <!-- Agrega más detalles según sea necesario -->

        <h2>Alumnos del Grupo:</h2>

        @if ($grupo->alumnos->isEmpty())
            <p>No hay alumnos en este grupo.</p>
        @else
            <ul>
                @foreach ($grupo->alumnos as $alumno)
                    <li>{{ $alumno->nombre }} {{ $alumno->apellido }}</li>
                    <!-- Puedes mostrar más detalles de cada alumno si es necesario -->
                @endforeach
            </ul>
        @endif

        <a href="{{ route('grupos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
