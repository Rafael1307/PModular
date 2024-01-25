
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Grupo</h1>

        <form action="{{ route('sis_grupos.update', $sisGrupo->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <input type="text" name="grupo" class="form-control" value="{{ $sisGrupo->grupo }}" required>
            </div>


            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection

