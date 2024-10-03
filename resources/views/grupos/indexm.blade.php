@extends('layouts.app')

@section('content')
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
@if(session('success'))
<div class="alert alert-success" role="alert">
    <h4><span>{{session('success')}}</span></h4>
</div>
@endif
    <div class="container">
        <h1>Opciones de Evaluación para la Materia:{{ $materiasList[$materia->materia] }}</h1>
        <p>(Grupo: {{ $materia->grupo->grado}} ° {{ $materia->grupo->grupo}})</p>

        <div>
            <h2>Opciones:</h2>
            <ul>
                <li><a href="{{ route('desgloce_calificaciones.evaluartrimestre', $materia->id) }}">Evaluar Grupo</a></li>
                <li><a href="{{ route('calificaciones.evaluartrimestre', $materia->id) }}">Subir Calificaciones</a></li>
            </ul>
        </div>

        <div>
            <h2>Alumnos en el Grupo:</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materia->grupo->alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->apellido }}</td>
                            <td>
                                <a href="{{ route('notas.create', ['materia' => $materia->id, 'alumno' => $alumno->id]) }}" class="btn btn-secondary">
                                    Agregar Nota
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
