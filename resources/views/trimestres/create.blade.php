@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Trimestre para el Ciclo: {{ $ciclo->ciclo }}</h1>

        <form action="{{ route('trimestres.store') }}" method="post">
            @csrf

            <!-- Agrega un campo oculto para enviar el id_ciclo -->
            <input type="hidden" name="id_ciclo" value="{{ $ciclo->id }}">

            <div class="form-group">
                <label for="trimestre">Trimestre:</label>
                <input type="text" name="trimestre" class="form-control" required>
            </div>

            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Trimestre</button>
        </form>
        <a href="{{ route('trimestres.index', $ciclo->id) }}" class="btn btn-primary">Volver</a>    </div>
@endsection
