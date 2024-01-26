@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Grupo</h1>

        <form action="{{ route('grupos.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="grado">Grado:</label>
                <input type="text" name="grado" class="form-control" required>
            </div>
            
            <input type="hidden" name="id_ciclo" value="{{ $ciclo->id }}">
            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <input type="text" name="grupo" class="form-control" required>
            </div>

            

            <div class="form-group">
                <label for="turno">Turno:</label>
                <select name="turno" class="form-control" required>
                    <option value="matutino">Matutino</option>
                    <option value="vespertino">Vespertino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_asesor">Asesor:</label>
                <select name="id_asesor" class="form-control" required>
                    @foreach ($maestros as $maestro)
                        <option value="{{ $maestro->id }}">{{ $maestro->nombre }} {{ $maestro->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_ciclo">Ciclo:</label>
                <p> {{ $ciclo->ciclo }} </p>
            </div>

            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Grupo</button>
        </form>
        <a href="{{ route('grupos.index', $ciclo->id) }}" class="btn btn-primary">Volver</a>

    </div>
@endsection
