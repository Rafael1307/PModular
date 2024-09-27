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
    <link href="{{ asset('css/trimestres/trimestres.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
    <div class="container">
        <h1>Editar Trimestre</h1>

        <form action="{{ route('trimestres.update', $trimestre->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="trimestre">Trimestre:</label>
                <input type="text" name="trimestre" class="form-control" value="{{ $trimestre->trimestre }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Trimestre</button>
        </form>
        <a href="{{ route('trimestres.index', $trimestre->id_ciclo) }}" class="btn btn-primary">Volver</a>
    </div>
@endsection

