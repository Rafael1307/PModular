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
    <link href="{{ asset('css/tutores/tutores.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
    <div class="container">
        <h1>Detalles del Tutor</h1>

        <div>
            <strong>Nombre:</strong> {{ $tutor->nombre }} <br>
            <strong>Apellido:</strong> {{ $tutor->apellido }} <br>
            <strong>Correo:</strong> {{ $tutor->correo }} <br>
            <strong>Teléfono:</strong> {{ $tutor->telefono }} <br>
            <!-- Agrega más detalles según sea necesario -->
        </div>

        <a href="{{ route('tutores.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection
