@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Trimestre</h1>

        <p>ID: {{ $sis_grupo->id }}</p>
        <p>Trimestre: {{ $sis_grupo->grupo }}</p>

        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
