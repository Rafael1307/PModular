@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Alumno</h1>

        <form action="{{ route('alumnos.store') }}" method="post" enctype="multipart/form-data">
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
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="id_grupo">Grupo:</label>
                <select name="id_grupo" class="form-control" required>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}"> {{$grupo->grado}} {{ $grupo->grupo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_sis">Grupo de Sistema:</label>
                <select name="id_sis" class="form-control" required>
                    @foreach ($sisGrupos as $sisGrupo)
                        <option value="{{ $sisGrupo->id }}">{{ $sisGrupo->grupo }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Alumno</button>
        </form>
        <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Volver al Listado</a>    </div>
@endsection

