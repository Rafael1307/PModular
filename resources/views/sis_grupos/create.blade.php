@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Grupo del Sistema</h1>

        <form action="{{ route('sis_grupos.store') }}" method="post">
            @csrf
            <input type="hidden" name="id_ciclo" value="{{ $ciclo->id }}">
            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <input type="text" name="grupo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_ciclo">Ciclo:</label>
                <p> {{ $ciclo->ciclo }} </p>
            </div>

            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Grupo del Sistema</button>
        </form>
        <a href="{{ route('sis_grupos.index', $ciclo->id) }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
