@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Materias</h1>

        <a href="{{ route('materias.create') }}" class="btn btn-primary">Crear Nueva Materia</a>

        @if ($materias->isEmpty())
            <p>No hay materias registradas.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Grupo</th>
                        <!-- Agrega otras columnas según sea necesario -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $materia)
                        <tr>
                            <td>{{ $materiasList[$materia->materia] }}</td>
                            <td>{{$materia->grupo->grado}} ° {{ $materia->grupo->grupo}}</td>
                            <!-- Agrega otras columnas según sea necesario -->
                            <td>
                                <a href="{{ route('materias.show', $materia->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-warning">Editar</a>
                                <!-- Agrega aquí más acciones según sea necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ url('/home')}}" class="btn btn-primary">Volver</a>
    </div>
@endsection
