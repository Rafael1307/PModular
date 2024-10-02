@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestor Adlr</title>
    <link rel="profile" type="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg">

    <!-- Scripts -->
    <script src="{{ asset('js/Home.js') }}" defer></script>
    <script src="{{ asset('js/Home.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/maestros/maestros.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
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
                @if ($materias->isEmpty())
                <p>El maestro no está asignado a ninguna materia.</p>
            @else
                <ul>
                    @foreach ($materias as $materia)
                        <li>
                            {{ $materiasList[$materia->materia] }}
                            (Grupo: {{ $materia->grupo->grado}} {{ $materia->grupo->grupo?? 'No asignado a un grupo' }})
                        </li>
                    @endforeach
                </ul>
            @endif
            </div>
        </div>
        <a href="{{ route('maestros.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection