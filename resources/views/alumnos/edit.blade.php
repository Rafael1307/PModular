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
    <link href="{{ asset('css/alumnos/alumnos.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
<style>

form {
    max-width: 800px;
    margin: 30px auto;
    background-color: #343a40;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1 {
    color: black;
    margin-bottom: 30px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #fff;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #fff;
}
body {
background-image: url('../../storage/uploads/FondoGris.png');
background-repeat: repeat;
background-size: auto; 
}
</style>
    <div class="container">
        <h1>Editar Alumno</h1>

        <form action="{{ route('alumnos.update', $alumno->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $alumno->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control" value="{{ $alumno->apellido }}" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" class="form-control" value="{{ $alumno->correo }}" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="form-control-file">
                <img src="{{ asset('storage/' . $alumno->foto) }}" alt="Foto actual" width="150">
            </div>

            <div class="form-group">
                <label for="id_grupo">Grupo:</label>
                <select name="id_grupo" class="form-control" required>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}" {{ $alumno->id_grupo == $grupo->id ? 'selected' : '' }}>
                            {{$grupo->grado}} {{ $grupo->grupo }} - {{ $grupo->turno}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_sis">Grupo de Sistema:</label>
                <select name="id_sis" class="form-control" required>
                    @foreach ($sisGrupos as $sisGrupo)
                        <option value="{{ $sisGrupo->id }}" {{ $alumno->id_sis == $sisGrupo->id ? 'selected' : '' }}>
                            {{ $sisGrupo->grupo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
        </form>
        
@endsection
