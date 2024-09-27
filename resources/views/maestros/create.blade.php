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
    <link href="{{ asset('css/maestros/maestros.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
    <div class="container">
        <h1>Agregar Nuevo Maestro</h1>

        <!-- Formulario de creación -->
        <form action="{{ route('maestros.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="number" name="telefono" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <select name="correo" class="form-control" required>
                    @foreach($usuariosConRolUno as $usuario)
                        <option value="{{ $usuario->email }}">{{ $usuario->email }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Otros campos según necesidades -->

            <!-- Botón de envío del formulario -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Crear Maestro</button>
            </div>
        </form>
        <a href="{{ route('maestros.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection