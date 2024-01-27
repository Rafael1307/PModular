@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Materia</h1>

        <form action="{{ route('materias.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="materia">Materia:</label>
                <select name="materia" class="form-control" required>
                    @foreach ($materiasList as $codigo => $nombre)
                        <option value="{{ $codigo }}">{{ $nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grupo_id">Grupo:</label>
                <select name="grupo_id" class="form-control" required>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->grado }}  {{ $grupo->grupo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="maestro_id">Maestro:</label>
                <select name="maestro_id" class="form-control" required>
                    @foreach ($maestros as $maestro)
                        <option value="{{ $maestro->id }}">{{ $maestro->nombre }} {{ $maestro->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Otros campos según sea necesario -->

            <button type="submit" class="btn btn-primary">Guardar Materia</button>
        </form>
    </div>
@endsection
