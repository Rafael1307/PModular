@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panel de Administración</div>

                    <div class="card-body">

                        <h4>Administrar Ciclos</h4>
                        <a href="{{ route('ciclos.index') }}" class="btn btn-primary">Ver Ciclos</a>

                        <hr>
                        <h4>Administrar Alumnos</h4>
                        <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Ver Alumnos</a>

                        <hr>

                        <h4>Administrar Maestros</h4>
                        <a href="{{ route('maestros.index') }}" class="btn btn-primary">Ver Maestros</a>

                        <hr>

                        <h4>Administrar Tutores</h4>
                        <a href="{{ route('tutores.index') }}" class="btn btn-primary">Ver Tutores</a>

                        <hr>

                        <h4>Administrar Materias</h4>
                        <a href="{{ route('materias.index') }}" class="btn btn-primary">Ver Tutores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection