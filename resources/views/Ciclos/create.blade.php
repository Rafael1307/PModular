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
    <link href="{{ asset('css/ciclos/create.css') }}" rel="stylesheet">
    
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
        <h1>Crear Ciclo</h1>

        <form action="{{ route('ciclos.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="ciclo">Ciclo:</label>
                <input type="text" name="ciclo" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Ciclo</button>
            <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver al Listado</a>
        </form>
        
    </div>
@endsection