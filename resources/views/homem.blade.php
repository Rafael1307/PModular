@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenido, {{ Auth::user()->maestro->nombre }} {{ Auth::user()->maestro->apellido }}</h1>

        @if(Auth::user()->rol == 1)
            <div>
                <h2>Mis Materias</h2>
                <p>Aquí puedes ver las materias asignadas a ti como maestro.</p>
                <a href="{{ url('/home')}}" class="btn btn-primary">Ver Mis Materias</a>
            </div>

            <div>
                <h2>Mis Grupos</h2>
                <p>Aquí puedes ver los grupos a los que estás asignado como asesor.</p>
                <a href="{{ url('/home')}}" class="btn btn-primary">Ver Mis Grupos</a>
            </div>
        @endif

        {{-- Otros apartados según sea necesario --}}
    </div>
@endsection
