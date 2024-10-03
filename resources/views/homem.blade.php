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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/homeM.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
    <div class="container">
        @if (Auth::user()->maestro)
        <h1>Bienvenido, {{ Auth::user()->maestro->nombre }} {{ Auth::user()->maestro->apellido }}</h1>

        @if(Auth::user()->rol == 1)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Mis Materias</h2></div>

                        <div class="card-body">

                            
                            @if($materias->isEmpty())
                                <p>No estás asignado a ninguna materia.</p>
                            @else
                                @foreach ($materias as $materia)
                                    <h4> {{ $materiasList[$materia->materia] }}</h4>
                                    <p>(Grupo: {{ $materia->grupo->grado}} ° {{ $materia->grupo->grupo}})</p>
                                    <a href="{{ route('grupos.indexm', $materia->id)}}" class="btn btn-primary">Ir a materia</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Mis Grupos</h2></div>

                        <div class="card-body">

                            
                            @if($materias->isEmpty())
                                <p>No asesoras a ninguna grupo.</p>
                            @else
                                @foreach ($grupos as $grupo)
                                    <h4> {{ $grupo->grado}} ° {{ $grupo->grupo}}</h4>
                                    
                                    <a href="{{route('grupo.alumnos', ['grupo' => $grupo->id])}}" class="btn btn-primary">Ir a grupo</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif
        @endif
        @if(!Auth::user()->maestro)
            <h4>Espera a ser asignado como maestro o dirigete a administracion para validar la informacion</h4>
        @endif
        {{-- Otros apartados según sea necesario --}}
    </div>
@endsection
