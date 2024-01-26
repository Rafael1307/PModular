@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Tutor</h1>

        <form action="{{ route('tutores.update', $tutor->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $tutor->nombre }}" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control" value="{{ $tutor->apellido }}" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" class="form-control" value="{{ $tutor->correo }}" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" value="{{ $tutor->telefono }}" required>
            </div>

            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
