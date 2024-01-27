@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Materia</h1>

        <form action="{{ route('materias.update', $materia->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="materia">Materia:</label>
                <select name="materia" class="form-control" required>
                    @foreach ($materiasList as $codigo => $nombre)
                        <option value="{{ $codigo }}" {{ $materia->materia == $codigo ? 'selected' : '' }}>
                            {{ $nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grupo_id">Grupo:</label>
                <select name="grupo_id" class="form-control" required>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}" {{ $materia->grupo_id == $grupo->id ? 'selected' : '' }}>
                            {{ $grupo->grado }} {{$grupo->grupo}} : {{$grupo->ciclo->ciclo}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="maestro_id">Maestro:</label>
                <select name="maestro_id" class="form-control" required>
                    @foreach ($maestros as $maestro)
                        <option value="{{ $maestro->id }}" {{ $materia->maestro_id == $maestro->id ? 'selected' : '' }}>
                            {{ $maestro->nombre }} {{ $maestro->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Otros campos según sea necesario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
