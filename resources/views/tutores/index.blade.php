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
        <h1>Listado de Tutores</h1>

        <a href="{{ route('tutores.create') }}" class="btn btn-primary">Crear Nuevo Tutor</a>

        @if ($tutores->isEmpty())
            <p>No hay tutores registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tutores as $tutor)
                        <tr>
                            <td>{{ $tutor->nombre }}</td>
                            <td>{{ $tutor->apellido }}</td>
                            <td>{{ $tutor->correo }}</td>
                            <td>{{ $tutor->telefono }}</td>
                            <td>
                                <a href="{{ route('tutores.show', $tutor->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('tutores.edit', $tutor->id) }}" class="btn btn-warning">Editar</a>
                                <!-- Agrega aquí más acciones según sea necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
