@extends('layouts.app')

@section('content')
<style>

form {
    max-width: 800px;
    margin: 30px auto;
    background-color: #343a40;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1 {
    color: black;
    margin-bottom: 30px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #fff;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #fff;
}
body {
background-image: url('../../storage/uploads/FondoGris.png');
background-repeat: repeat;
background-size: auto; 
}
</style>
    <div class="container">
        <h1>Editar Grupo</h1>

        <form action="{{ route('grupos.update', $grupo->id) }}" method="post">
            @csrf
            @method('put')


            <div class="form-group">
                <label for="grado">Grado:</label>
                <input type="text" name="grado" class="form-control" value="{{ $grupo->grado }}" required>
            </div>
            
            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <input type="text" name="grupo" class="form-control" value="{{ $grupo->grupo }}" required>
            </div>

            

            <div class="form-group">
                <label for="turno">Turno:</label>
                <select name="turno" class="form-control" required>
                    <option value="matutino" {{ $grupo->turno === 'matutino' ? 'selected' : '' }}>Matutino</option>
                    <option value="vespertino" {{ $grupo->turno === 'vespertino' ? 'selected' : '' }}>Vespertino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_asesor">Asesor:</label>
                <select name="id_asesor" class="form-control" required>
                    @foreach ($maestros as $maestro)
                        <option value="{{ $maestro->id }}" {{ $grupo->id_asesor == $maestro->id ? 'selected' : '' }}>
                            {{ $maestro->nombre }} {{ $maestro->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>


            <!-- Resto del formulario -->

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('grupos.index', $grupo->id_ciclo) }}" class="btn btn-primary">Volver</a>
        </form>
        

    </div>
@endsection

