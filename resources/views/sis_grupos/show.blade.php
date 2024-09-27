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
    <link href="{{ asset('css/sis_grupos/sis_grupos.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
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