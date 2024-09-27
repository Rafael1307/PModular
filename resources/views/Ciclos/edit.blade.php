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
    <link href="{{ asset('css/ciclos/edit.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
    <div class="container">
        <h1>Editar Ciclo</h1>

        <form action="{{ route('ciclos.update', $ciclo->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ciclo">Ciclo:</label>
                <input type="text" name="ciclo" class="form-control" value="{{ $ciclo->ciclo }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Ciclo</button>
        </form>
        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection
