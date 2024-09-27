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
    <link href="{{ asset('css/materias/materias.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
    <div class="container">
        <h1>Listado de Materias</h1>

        <a href="{{ route('materias.create') }}" class="btn btn-primary">Crear Nueva Materia</a>

        @if ($materias->isEmpty())
            <p>No hay materias registradas.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Grupo</th>
                        <!-- Agrega otras columnas según sea necesario -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $materia)
                        <tr>
                            <td>{{ $materiasList[$materia->materia] }}</td>
                            <td>{{$materia->grupo->grado}} ° {{ $materia->grupo->grupo}}</td>
                            <!-- Agrega otras columnas según sea necesario -->
                            <td>
                                <a href="{{ route('materias.show', $materia->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-warning">Editar</a>
                                <!-- Agrega aquí más acciones según sea necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ url('/home')}}" class="btn btn-primary">Volver</a>
    </div>
@endsection
