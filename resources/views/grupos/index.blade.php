@extends('layouts.app')

@section('content')
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
