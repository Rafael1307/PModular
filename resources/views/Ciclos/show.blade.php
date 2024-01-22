@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Ciclo</h1>

        <p>ID: {{ $ciclo->id }}</p>
        <p>Ciclo: {{ $ciclo->ciclo }}</p>

        <h2>Trimestres Asociados:</h2>
        <a href="{{ route('trimestres.create', ['id_ciclo' => $ciclo->id]) }}" class="btn btn-primary">Crear Trimestre</a>

        @if ($ciclo->trimestres->isEmpty())
            <p>No hay trimestres asociados a este ciclo.</p>
        @else
            <ul>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Trimestre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ciclo->trimestres as $trimestre)
                            <tr>
                                <td>{{ $trimestre->trimestre }}</td>
                                <td>
                                    <a href="{{ route('trimestres.show', $trimestre->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('trimestres.edit', $trimestre->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('trimestres.destroy', $trimestre->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
        @endif
        <h2>Grupos Asociados:</h2>
        <a href="{{ route('ciclos.create') }}" class="btn btn-primary">Crear Grupo</a>

        @if ($ciclo->grupos->isEmpty())
            <p>No hay grupos asociados a este ciclo.</p>
        @else
            <ul>
                @foreach ($ciclo->grupos as $grupo)
                    <li>{{ $grupo->grupo }}</li>
                    <a href="{{ route('ciclos.show', $ciclo->id) }}" class="btn btn-info">Ver</a>
                    <!-- Puedes mostrar más detalles de cada grupo si es necesario -->
                @endforeach
            </ul>
        @endif

        <h2>Grupos SEP Asociados:</h2>
        <a href="{{ route('ciclos.create') }}" class="btn btn-primary">Crear Grupo SEP</a>

        @if ($ciclo->grupos->isEmpty())
            <p>No hay grupos asociados a este ciclo.</p>
        @else
            <ul>
                @foreach ($ciclo->sis_grupos as $grupo)
                    <li>{{ $grupo->grupo }}</li>
                    <a href="{{ route('ciclos.show', $ciclo->id) }}" class="btn btn-info">Ver</a>
                    <!-- Puedes mostrar más detalles de cada grupo si es necesario -->
                @endforeach
            </ul>
        @endif

        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection