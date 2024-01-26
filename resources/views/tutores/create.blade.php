@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Tutor</h1>

        <form action="{{ route('tutores.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" required>
            </div>

            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Tutor</button>
        </form>
    </div>
@endsection
