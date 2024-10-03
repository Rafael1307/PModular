@extends('layouts.app')

@section('content')
<style>

form {
    max-width: 800px;
    margin: 30px auto;
    background-color: #343a40;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1 {
    color: black;
    margin-bottom: 30px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #fff;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #fff;
}
body {
background-image: url('../../storage/uploads/FondoGris.png');
background-repeat: repeat;
background-size: auto; 
}
</style>
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
                    <th><b>Calificacion final</b></th>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('calificaciones.subirevaluacion', ['materia_id' => $materia->id, 'trimestre_id' => $trimestre_id]) }}" method="post">
                @csrf
                @method('put')
                @foreach ($alumnos as $alumno)
                @foreach($alumno->desgloces as $calificacion)
                @if($calificacion->id_materia == $materia->id)
                @if($calificacion->id_trimestre == $trimestre_id)
                    <tr>
                        <td>{{ $calificacion->alumno->nombre }} {{ $calificacion->alumno->apellido }}</td>
                        @if($calificacion->actividades)
                        <td>{{$calificacion->actividades}}</td>
                        <td>{{$calificacion->proyecto}}</td>
                        <td>{{$calificacion->desempeno}}</td>
                        <td>{{ $calificacion->total }}</td>
                        @endif
                        @if(!$calificacion->total)
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @endif
                        <!-- Agrega más columnas según tus necesidades -->
                    
                    @endif
                    @endif
                    @endforeach
                    @foreach($alumno->calificaciones as $calificacion)
                    @if($calificacion->id_materia == $materia->id)
                    @if($calificacion->id_trimestre == $trimestre_id)
                    <input value="{{ $calificacion->id}}" type="hidden" name="id[]">
                    <td><input value="{{$calificacion->calificacion}}" type="number" name="calificacion[]" required></td>
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
