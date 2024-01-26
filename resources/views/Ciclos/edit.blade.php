@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Ciclo</h1>

        <form action="{{ route('ciclos.update', $ciclo->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ciclo">Ciclo:</label>
                <input type="text" name="ciclo" class="form-control" value="{{ $ciclo->ciclo }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Ciclo</button>
        </form>
        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection
