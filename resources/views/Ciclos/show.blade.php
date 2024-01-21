@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Ciclo</h1>

        <p>ID: {{ $ciclo->id }}</p>
        <p>Ciclo: {{ $ciclo->ciclo }}</p>

        <h2>Trimestres Asociados:</h2>

        @if ($ciclo->trimestres->isEmpty())
            <p>No hay trimestres asociados a este ciclo.</p>
        @else
            <ul>
                @foreach ($ciclo->trimestres as $trimestre)
                    <li>{{ $trimestre->trimestre }}</li>
                    <!-- Puedes mostrar más detalles de cada trimestre si es necesario -->
                @endforeach
            </ul>
        @endif

        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection