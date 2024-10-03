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
    <link href="{{ asset('css/ciclos/show.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
<style>
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
        .table {
            background-color: #424549;
            color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead th {
            background-color: #424549;
            border-bottom: none;
            padding: 15px;
            color: white;
        }
        .table td {
            background-color: #424549;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }
        .table tr {
            display: flex;
            margin-bottom: 5px;
        }
        .table td:nth-child(1) { flex: 2; }
        .table td:nth-child(2) { flex: 1; }
        .table td:nth-child(3) { flex: 1; }
        .btn-primary, .btn-info, .btn-warning {
            margin: 2px;
        }
    </style>
    <div class="container">
        <h1>Detalles del Ciclo</h1>
        <h2>Ciclo: {{ $ciclo->ciclo }}</h2>

        <h2>Trimestres Asociados:</h2>
        <a href="{{ route('trimestres.create', ['id_ciclo' => $ciclo->id]) }}" class="btn btn-primary">Crear Trimestre</a>

        @if ($ciclo->trimestres->isEmpty())
            <p>No hay trimestres asociados a este ciclo.</p>
        @else
            <ul>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Trimestre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ciclo->trimestres as $trimestre)
                            <tr>
                                <td>{{ $trimestre->trimestre }}</td>
                                <td>
                                    <a href="{{ route('trimestres.show', $trimestre->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('trimestres.edit', $trimestre->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('trimestres.destroy', $trimestre->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
        @endif
        <h2>Grupos Asociados:</h2>
        <a href="{{ route('grupos.create', ['id_ciclo' => $ciclo->id]) }}" class="btn btn-primary">Crear Grupo</a>

        @if ($ciclo->grupos->isEmpty())
            <p>No hay grupos asociados a este ciclo.</p>
        @else
            <ul>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Grupo</th>
                            <th>Grado</th>
                            <th>Turno</th>
                            <th>Asesor</th>
                            <th>Ciclo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ciclo->grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->grupo }}</td>
                                <td>{{ $grupo->grado }}</td>
                                <td>{{ $grupo->turno }}</td>
                                <td>{{ $grupo->asesor->nombre }} {{ $grupo->asesor->apellido }}</td>
                                <td>{{ $grupo->ciclo->ciclo }}</td>
                                <td>
                                    <a href="{{ route('grupos.show', $grupo->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('grupos.destroy', $grupo->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                    <a href="{{route('grupos.showtrimestres', $grupo->id) }}" class="btn btn-info">Calificaciones</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
        @endif

        <h2>Grupos SEP Asociados:</h2>
        <a href="{{ route('sis_grupos.create', ['id_ciclo' => $ciclo->id]) }}" class="btn btn-primary">Crear Grupo SEP</a>

        @if ($ciclo->sis_grupos->isEmpty())
            <p>No hay grupos asociados a este ciclo.</p>
        @else
            <ul>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Grupo</th>
                            <th>Ciclo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ciclo->sis_grupos as $sisGrupo)
                            <tr>
                                <td>{{ $sisGrupo->grupo }}</td>
                                <td>{{ $sisGrupo->ciclo->ciclo }}</td>
                                <td>
                                    <a href="{{ route('sis_grupos.show', $sisGrupo->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('sis_grupos.edit', $sisGrupo->id) }}" class="btn btn-warning">Editar</a>
                                    <!-- Agrega aquí más acciones según sea necesario -->
                                    <form action="{{ route('sis_grupos.destroy', $sisGrupo->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                    <a href="{{ route('sis_grupos.showtrimestres', $sisGrupo->id) }}" class="btn btn-info">Ver Calificaciones</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
        @endif

        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection