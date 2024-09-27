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
        <h1>Editar Materia</h1>

        <form action="{{ route('materias.update', $materia->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="materia">Materia:</label>
                <select name="materia" class="form-control" required>
                    @foreach ($materiasList as $codigo => $nombre)
                        <option value="{{ $codigo }}" {{ $materia->materia == $codigo ? 'selected' : '' }}>
                            {{ $nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grupo_id">Grupo:</label>
                <select name="grupo_id" class="form-control" required>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}" {{ $materia->grupo_id == $grupo->id ? 'selected' : '' }}>
                            {{ $grupo->grado }} {{$grupo->grupo}} : {{$grupo->ciclo->ciclo}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="maestro_id">Maestro:</label>
                <select name="maestro_id" class="form-control" required>
                    @foreach ($maestros as $maestro)
                        <option value="{{ $maestro->id }}" {{ $materia->maestro_id == $maestro->id ? 'selected' : '' }}>
                            {{ $maestro->nombre }} {{ $maestro->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Otros campos según sea necesario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
