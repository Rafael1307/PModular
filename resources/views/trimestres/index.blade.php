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
        <h1>Listado de Ciclos</h1>

        <a href="{{ route('ciclos.create') }}" class="btn btn-primary">Crear Ciclo</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Ciclo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($ciclos as $ciclo)
                    <tr>
                        <td>{{ $ciclo->ciclo }}</td>
                        <td>
                            <a href="{{ route('ciclos.show', $ciclo->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('ciclos.edit', $ciclo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('ciclos.destroy', $ciclo->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection