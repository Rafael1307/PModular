@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Maestro</h1>

        <!-- Datos del Maestro -->
        <div class="card mb-4">
            <div class="card-body">
                <h3>{{ $maestros->nombre }} {{ $maestros->apellido }}</h3>
                <p>Correo: {{ $maestros->correo }}</p>
                <p>Teléfono: {{ $maestros->telefono }}</p>
                <!-- Otros datos del maestro según necesidades -->
            </div>
        </div>

        <!-- Lista de Materias del Maestro -->
        <div class="card">
            <div class="card-header">
                <h4>Materias Asignadas</h4>
            </div>
            <div class="card-body">
                @if ($maestros->materias->count() > 0)
                    <ul>
                        @foreach ($maestros->materias as $materia)
                            <li>{{ $materia->nombre }}</li>
                            <!-- Puedes mostrar más detalles de la materia si es necesario -->
                        @endforeach
                    </ul>
                @else
                    <p>Este maestro no tiene materias asignadas.</p>
                @endif
            </div>
        </div>
    </div>
@endsection