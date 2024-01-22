@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Trimestre</h1>

        <p>ID: {{ $trimestre->id }}</p>
        <p>Trimestre: {{ $trimestre->trimestre }}</p>

        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
