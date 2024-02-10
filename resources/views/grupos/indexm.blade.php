@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Opciones de Evaluación para la Materia:{{ $materiasList[$materia->materia] }}</h1>
        <p>(Grupo: {{ $materia->grupo->grado}} ° {{ $materia->grupo->grupo}})</p>

        <div>
            <h2>Opciones:</h2>
            <ul>
                <li><a href="{{ route('desgloce_calificaciones.evaluartrimestre', $materia->id) }}">Evaluar Grupo</a></li>
                <li><a href="#">Subir Calificaciones</a></li>
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
                                <a href="#">
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
