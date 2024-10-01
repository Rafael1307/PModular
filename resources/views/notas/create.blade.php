@extends('layouts.app')

@section('content')
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
