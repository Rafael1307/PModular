@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Alumnos de {{ $grupo->grado }} ° {{ $grupo->grupo }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>
                        <a href="{{ route('alumno.detalle', ['alumno' => $alumno->id, 'grupo' => $grupo->id]) }}" class="btn btn-primary">Ver Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
