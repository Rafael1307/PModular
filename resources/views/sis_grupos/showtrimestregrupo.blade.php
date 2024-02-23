@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('sis_grupo.showcalificaciones', $sisGrupo->id) }}" method="post">
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