@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bienvenido, {{ Auth::user()->maestro->nombre }} {{ Auth::user()->maestro->apellido }}</h1>

        @if(Auth::user()->rol == 1)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Mis Materias</h2></div>

                        <div class="card-body">

                            
                            @if($materias->isEmpty())
                                <p>No estás asignado a ninguna materia.</p>
                            @else
                                @foreach ($materias as $materia)
                                    <h4> {{ $materiasList[$materia->materia] }}</h4>
                                    <p>(Grupo: {{ $materia->grupo->grado}} ° {{ $materia->grupo->grupo}})</p>
                                    <a href="{{ url('/home')}}" class="btn btn-primary">Ir a materia</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Mis Grupos</h2></div>

                        <div class="card-body">

                            
                            @if($materias->isEmpty())
                                <p>No asesoras a ninguna grupo.</p>
                            @else
                                @foreach ($grupos as $grupo)
                                    <h4> {{ $grupo->grado}} ° {{ $grupo->grupo}}</h4>
                                    
                                    <a href="{{ url('/home')}}" class="btn btn-primary">Ir a grupo</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

        {{-- Otros apartados según sea necesario --}}
    </div>
@endsection
