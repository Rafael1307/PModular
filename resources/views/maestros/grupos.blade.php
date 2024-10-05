@extends('layouts.app')

@section('content')
<style>
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
        body {
    background-image: url('../../storage/uploads/waves.gif');
    background-repeat: repeat;
    background-size: auto; 
}
</style>
<div class="container">
    <h1>Grupos Asesorados</h1>
    @if($grupos->isEmpty())
        <p>No asesoras a ningún grupo.</p>
    @else
        @foreach($grupos as $grupo)
            <h4>{{ $grupo->grado }} ° {{ $grupo->grupo }}</h4>
            <a href="{{ route('grupo.alumnos', ['grupo' => $grupo->id]) }}" class="btn btn-primary">Ver Alumnos</a>
        @endforeach
    @endif
</div>
@endsection