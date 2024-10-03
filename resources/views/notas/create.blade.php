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
    <h2>Agregar Nota para {{ $alumno->nombre }} {{ $alumno->apellido }}</h2>
    
    <form action="{{ route('notas.store', ['materia' => $id_materia, 'alumno' => $alumno->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="asunto">Asunto</label>
            <select name="asunto" id="asunto" class="form-control" required>
                <option value="">Selecciona un asunto</option>
                @foreach ($asuntos as $asunto)
                    <option value="{{ $asunto }}">{{ $asunto }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Nota</button>
    </form>
</div>
@endsection
