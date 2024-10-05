@extends('layouts.app')

@section('content')
@if(session('success'))
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


</style>
<div class="alert alert-success" role="alert">
    <h4><span>{{session('success')}}</span></h4>
</div>
@endif
    <div class="container">
        <div class="container">
            <h1>Listado de Alumnos</h1>
            <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Crear Nuevo Alumno</a>
        </div>

        @if ($alumnos->isEmpty())
            <p>No hay alumnos registrados.</p>
            
        @else
            <div class="row">
                @foreach ($alumnos as $alumno)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $alumno->foto) }}" class="card-img-top" alt="Foto del Alumno">
                            <div class="card-body">
                                <h5 class="card-title">{{ $alumno->apellido }} {{ $alumno->nombre }} </h5>
                                <p class="card-text">
                                    <strong>Correo:</strong> {{ $alumno->correo }} <br>
                                    <strong>Grupo:</strong> {{ $alumno->grupo->grado }}°{{$alumno->grupo->grupo}} <br>
                                    <!-- Agrega más detalles según sea necesario -->
                                </p>
                                <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">
                                    <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-info">Ver Detalles</a>
                                    <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">Editar</a>
                                </form>
                                    <!-- Agrega aquí más acciones según sea necesario -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <a href="{{ url('/home')}}" class="btn btn-primary">Volver</a>
    </div>
@endsection