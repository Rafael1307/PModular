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