@extends('layouts.app')

@section('content')
    <h1>Calificaciones</h1>

    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Materia</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calificaciones as $calificacion)
                <tr>
                    <td>{{ $calificacion->alumno->nombre }} {{ $calificacion->alumno->apellido }}</td>
                    <td>{{ $calificacion->materia->materia }}</td>
                    <td>{{ $calificacion->calificacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection