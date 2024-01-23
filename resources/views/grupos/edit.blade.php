@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Grupo</h1>

        <form action="{{ route('grupos.update', $grupo->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <input type="text" name="grupo" class="form-control" value="{{ $grupo->grupo }}" required>
            </div>

            <div class="form-group">
                <label for="grado">Grado:</label>
                <input type="text" name="grado" class="form-control" value="{{ $grupo->grado }}" required>
            </div>

            <div class="form-group">
                <label for="turno">Turno:</label>
                <input type="text" name="turno" class="form-control" value="{{ $grupo->turno }}" required>
            </div>

            <div class="form-group">
                <label for="id_asesor">Asesor:</label>
                <select name="id_asesor" class="form-control" required>
                    @foreach ($maestros as $maestro)
                        <option value="{{ $maestro->id }}" {{ $grupo->id_asesor == $maestro->id ? 'selected' : '' }}>
                            {{ $maestro->nombre }} {{ $maestro->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>


            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection

