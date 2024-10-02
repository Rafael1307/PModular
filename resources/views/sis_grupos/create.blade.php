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
        <h1>Crear Grupo del Sistema</h1>

        <form action="{{ route('sis_grupos.store') }}" method="post">
            @csrf
            <input type="hidden" name="id_ciclo" value="{{ $ciclo->id }}">
            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <input type="text" name="grupo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_ciclo">Ciclo:</label>
                <p> {{ $ciclo->ciclo }} </p>
            </div>

            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Grupo del Sistema</button>
        </form>
        <a href="{{ route('sis_grupos.index', $ciclo->id) }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
