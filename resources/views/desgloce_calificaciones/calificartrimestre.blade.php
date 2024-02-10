@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Desglose de Calificaciones</h1>

        <table border="1" class="table">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Actividades</th>
                    <th>Proyecto</th>
                    <th>Desempeño</th>
                    <th>Total</th>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('desgloce_calificaciones.subirevaluacion', ['materia_id' => $materia->id, 'trimestre_id' => $trimestre_id]) }}" method="post">
                @csrf
                @method('put')
                @foreach ($alumnos as $alumno)
                @foreach($alumno->desgloces as $calificacion)
                    <tr>
                        <td>{{ $calificacion->alumno->nombre }} {{ $calificacion->alumno->apellido }}</td>
                        <td><input value="{{$calificacion->actividades}}" type="number" name="actividades[]" required></td>
                        <td><input value="{{$calificacion->proyecto}}" type="text" name="proyecto[]" required></td>
                        <td><input value="{{$calificacion->desempeno}}" type="text" name="desempeno[]" required></td>
                        <td>{{ $calificacion->total }}</td>
                        <!-- Agrega más columnas según tus necesidades -->
                    </tr>
                @endforeach
                @endforeach
                <button type="submit" class="btn btn-primary">Guardar Evaluacion</button>
                </form>
            </tbody>
        </table>

        <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
