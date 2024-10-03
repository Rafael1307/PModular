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
        body {
    background-image: url('../../storage/uploads/FondoGris.png');
    background-repeat: repeat;
    background-size: auto; 
}
    </style>
    <div class="container">
        <h1>Listado de Grupos</h1>

        <a href="{{ route('grupos.create') }}" class="btn btn-primary">Crear Nuevo Grupo</a>

        @if ($grupos->isEmpty())
            <p>No hay grupos registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Grupo</th>
                        <th>Grado</th>
                        <th>Turno</th>
                        <th>Asesor</th>
                        <th>Ciclo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->grupo }}</td>
                            <td>{{ $grupo->grado }}</td>
                            <td>{{ $grupo->turno }}</td>
                            <td>{{ $grupo->asesor->nombre }} {{ $grupo->asesor->apellido }}</td>
                            <td>{{ $grupo->ciclo->ciclo }}</td>
                            <td>
                                <a href="{{ route('grupos.show', $grupo->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-warning">Editar</a>
                                <!-- Agrega aquí más acciones según sea necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
