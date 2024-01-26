@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Ciclo</h1>

        <form action="{{ route('ciclos.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="ciclo">Ciclo:</label>
                <input type="text" name="ciclo" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Ciclo</button>
        </form>
        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection