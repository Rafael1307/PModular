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
            <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
        </form>

        
        
    </div>
@endsection
