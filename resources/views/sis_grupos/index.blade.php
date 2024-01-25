@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Grupos del Sistema</h1>

        <a href="{{ route('sis_grupos.create') }}" class="btn btn-primary">Crear Nuevo Grupo del Sistema</a>

        @if ($sisGrupos->isEmpty())
            <p>No hay grupos del sistema registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Grupo</th>
                        <th>Ciclo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sisGrupos as $sisGrupo)
                        <tr>
                            <td>{{ $sisGrupo->grupo }}</td>
                            <td>{{ $sisGrupo->ciclo->ciclo }}</td>
                            <td>
                                <a href="{{ route('sis_grupos.show', $sisGrupo->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('sis_grupos.edit', $sisGrupo->id) }}" class="btn btn-warning">Editar</a>
                                <!-- Agrega aquí más acciones según sea necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
