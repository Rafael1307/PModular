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
    <script src="{{ asset('') }}" defer></script>
    <script src="{{ asset('') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/alumnos/alumnos.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
<style>
    .container{
        background-color: white;
    }
</style>
    <div class="container">
        <h1>Detalles del Alumno</h1>

        <div>
            <strong>Nombre:</strong> {{ $alumno->nombre }} <br>
            <strong>Apellido:</strong> {{ $alumno->apellido }} <br>
            <strong>Correo:</strong> {{ $alumno->correo }} <br>
            <strong>Foto:</strong> <img src="{{ asset('storage/' . $alumno->foto) }}" alt="Foto del Alumno" width="150"> <br>
            <strong>Grupo:</strong> {{ $alumno->grupo->grupo }} <br>
            <!-- Agrega más detalles según sea necesario -->
            <h2>Tutores Relacionados</h2>
            @if ($alumno->tutores->isEmpty())
                <p>No hay tutores relacionados.</p>
            @else
                <ul>
                    @foreach ($alumno->tutores as $tutor)
                        <li>
                            <strong>Nombre:</strong> {{ $tutor->nombre }} <br>
                            <strong>Apellido:</strong> {{ $tutor->apellido }} <br>
                            <strong>Correo:</strong> {{ $tutor->correo }} <br>
                            <strong>Teléfono:</strong> {{ $tutor->telefono }} <br>
                            <!-- Agrega más detalles del tutor según sea necesario -->
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection
