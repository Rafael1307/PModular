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
        <h1>Calificaciones {{$sisGrupo->grupo}}</h1>

        <table border="1" class="table">
            <thead>
                <tr>
                    <th >Alumnos</th>
                    @foreach($materias as $materia)
                        <th style="writing-mode: vertical-lr; transform: rotate(180deg);">{{ $materiasList[$materia->materia] }}</th>
                    @endforeach
                </tr>

            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->apellido}} {{$alumno->nombre}}</td>
                    @foreach($materias as $materia)
                    @php
                        $var = "N/A";
                    @endphp

                    @foreach($alumno->calificaciones as $calificacion)
                        @if($calificacion->id_materia == $materia->id && $calificacion->id_trimestre == $trimestre_id)
                            @php
                                $var = $calificacion->calificacion;
                            @endphp
                        @endif
                    @endforeach

                    <td>{{$var}}</td>
                @endforeach
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

@endsection