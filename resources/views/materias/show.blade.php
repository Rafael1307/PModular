@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Materia</h1>

        <div>
            <strong>Materia:</strong> {{ $materiasList[$materia->materia] }} <br>
            <!-- Muestra otros detalles según sea necesario -->
        </div>

        <a href="{{ route('materias.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>
@endsection
