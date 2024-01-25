@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Grupo: {{ $sisGrupo->grupo }}</h1>

        <p>Grado: {{ $sisGrupo->grupo }}</p>

        <!-- Agrega más detalles según sea necesario -->

        <h2>Alumnos del Grupo:</h2>

        @if ($sisGrupo->alumnos->isEmpty())
            <p>No hay alumnos en este grupo.</p>
        @else
            <ul>
                @foreach ($sisGrupo->alumnos as $alumno)
                    <li>{{ $alumno->nombre }} {{ $alumno->apellido }}</li>
                    <!-- Puedes mostrar más detalles de cada alumno si es necesario -->
                @endforeach
            </ul>
        @endif

        <a href="{{ route('sis_grupos.index', $sisGrupo->id_ciclo) }}" class="btn btn-primary">Volver</a>
    </div>
@endsection