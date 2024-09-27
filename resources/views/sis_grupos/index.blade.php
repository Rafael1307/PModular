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
        <h1>Listado de Grupos del Sistema</h1>

        <a href="{{ route('sis_grupos.create') }}" class="btn btn-primary">Crear Nuevo Grupo del Sistema</a>

        @if ($sisGrupos->isEmpty())
            <p>No hay grupos del sistema registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Grupo</th>
                        <th>Ciclo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sisGrupos as $sisGrupo)
                        <tr>
                            <td>{{ $sisGrupo->grupo }}</td>
                            <td>{{ $sisGrupo->ciclo->ciclo }}</td>
                            <td>
                                <a href="{{ route('sis_grupos.show', $sisGrupo->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('sis_grupos.edit', $sisGrupo->id) }}" class="btn btn-warning">Editar</a>
                                <!-- Agrega aquí más acciones según sea necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
