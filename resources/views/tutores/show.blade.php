@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Tutor</h1>

        <div>
            <strong>Nombre:</strong> {{ $tutor->nombre }} <br>
            <strong>Apellido:</strong> {{ $tutor->apellido }} <br>
            <strong>Correo:</strong> {{ $tutor->correo }} <br>
            <strong>Teléfono:</strong> {{ $tutor->telefono }} <br>
            <!-- Agrega más detalles según sea necesario -->
        </div>

        <a href="{{ route('tutores.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection
