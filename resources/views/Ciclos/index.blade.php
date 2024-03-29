@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listado de Ciclos</h1>
            <a href="{{ route('ciclos.create') }}" class="btn btn-primary">Crear Ciclo</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Ciclo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($ciclos as $ciclo)
                    <tr>
                        <td>{{ $ciclo->ciclo }}</td>
                        <td>
                            <a href="{{ route('ciclos.show', $ciclo->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('ciclos.edit', $ciclo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('ciclos.destroy', $ciclo->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('/home')}}" class="btn btn-primary">Volver</a>
    </div>
@endsection