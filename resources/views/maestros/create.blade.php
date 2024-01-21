@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Nuevo Maestro</h1>

        <!-- Formulario de creación -->
        <form action="{{ route('maestros.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="number" name="telefono" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <select name="correo" class="form-control" required>
                    @foreach($usuariosConRolUno as $usuario)
                        <option value="{{ $usuario->email }}">{{ $usuario->email }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Otros campos según necesidades -->

            <!-- Botón de envío del formulario -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Crear Maestro</button>
            </div>
        </form>
    </div>
@endsection