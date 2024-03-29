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
                @if($calificacion->id_materia == $materia->id)
                @if($calificacion->id_trimestre == $trimestre_id)
                    <tr>
                        <td>{{ $calificacion->alumno->nombre }} {{ $calificacion->alumno->apellido }}<input value="{{ $calificacion->id}}" type="hidden" name="id[]"></td>
                        <td><input value="{{$calificacion->actividades}}" type="number" name="actividades[]" required></td>
                        <td><input value="{{$calificacion->proyecto}}" type="number" name="proyecto[]" required></td>
                        <td><input value="{{$calificacion->desempeno}}" type="number" name="desempeno[]" required></td>
                        <td>{{ $calificacion->total }}</td>
                        <!-- Agrega más columnas según tus necesidades -->
                    </tr>
                    @endif
                    @endif
                @endforeach
                @endforeach
                <button type="submit" class="btn btn-primary">Guardar Evaluacion</button>
                </form>
            </tbody>
        </table>

        <a href="{{ route('grupos.indexm', $materia->id)}}" class="btn btn-primary">Volver a materia</a>
    </div>
@endsection
