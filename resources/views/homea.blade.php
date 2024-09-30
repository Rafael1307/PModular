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
    <link href="{{ asset('css/Home.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/Home.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <style>
        .card {
            background-color: #424549;
            color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .card-header {
            background-color: #424549;
            border-bottom: none;
            padding: 20px;
            font-size: 1.2em;
        }
        .card-body {
            padding: 0 20px 20px;
        }
        .card-body h4 {
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #0c9eec;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 15px;
            width: 15%;
            text-align: center;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: white;
            color: #0c9eec;
        }
        hr {
            border-color: rgba(255,255,255,0.1);
            margin: 20px 0;
        }
        h4 {
            background-color: white;
            color: #424549;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 15px;
            width: 100%;
            text-align: left;
            transition: background-color 0.3s;
        }
    </style>
</head>
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panel de Administración</div>

                    <div class="card-body">

                        <h4>Administrar Ciclos</h4>
                        <a href="{{ route('ciclos.index') }}" class="btn btn-primary" id="boton">Ver Ciclos
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>

                        <hr>
                        <h4>Administrar Alumnos</h4>
                        <a href="{{ route('alumnos.index') }}" class="btn btn-primary"id="boton">Ver Alumnos
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>


                        <hr>

                        <h4>Administrar Maestros</h4>
                        <a href="{{ route('maestros.index') }}" class="btn btn-primary"id="boton">Ver Maestros
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>

                        <hr>

                        <h4>Administrar Tutores</h4>
                        <a href="{{ route('tutores.index') }}" class="btn btn-primary"id="boton">Ver Tutores
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>

                        <hr>

                        <h4>Administrar Materias</h4>
                        <a href="{{ route('materias.index') }}" class="btn btn-primary"id="boton">Ver Tutores
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection