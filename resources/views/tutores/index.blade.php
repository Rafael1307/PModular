@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Tutores</h1>

        <a href="{{ route('tutores.create') }}" class="btn btn-primary">Crear Nuevo Tutor</a>

        @if ($tutores->isEmpty())
            <p>No hay tutores registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tutores as $tutor)
                        <tr>
                            <td>{{ $tutor->nombre }}</td>
                            <td>{{ $tutor->apellido }}</td>
                            <td>{{ $tutor->correo }}</td>
                            <td>{{ $tutor->telefono }}</td>
                            <td>
                                <a href="{{ route('tutores.show', $tutor->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('tutores.edit', $tutor->id) }}" class="btn btn-warning">Editar</a>
                                <!-- Agrega aquí más acciones según sea necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
