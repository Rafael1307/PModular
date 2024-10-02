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

        <form action="{{ route('sis_grupo.showcalificaciones', $sisGrupo->id) }}" method="post">
            @csrf
            <label for="trimestre">Selecciona el Trimestre:</label>
            <select name="trimestre" id="trimestre">
                @foreach ($trimestres as $trimestre)
                    <option value="{{ $trimestre->id }}">{{ $trimestre->trimestre }}</option>
                @endforeach
            </select>
            <button type="submit">Evaluar Grupo</button>
        </form>

        
        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection