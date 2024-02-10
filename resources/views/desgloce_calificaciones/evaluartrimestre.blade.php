@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Evaluar Grupo - Materia: {{ $materia->nombre }}</h1>

        <form action="{{ route('desgloce_calificaciones.calificargrupo', $materia->id) }}" method="post">
            @csrf
            <label for="trimestre">Selecciona el Trimestre:</label>
            <select name="trimestre" id="trimestre">
                @foreach ($trimestres as $trimestre)
                    <option value="{{ $trimestre->id }}">{{ $trimestre->trimestre }}</option>
                @endforeach
            </select>
            <button type="submit">Evaluar Grupo</button>
        </form>

        
        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
