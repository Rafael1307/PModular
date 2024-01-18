@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panel de Administración</div>

                    <div class="card-body">
                        <h4>Administrar Alumnos</h4>
                        <a href="{{ route('alumnos.index') }}">Ver Alumnos</a>

                        <hr>

                        <h4>Administrar Maestros</h4>
                        <a href="{{ route('maestros.index') }}">Ver Maestros</a>

                        <hr>

                        <h4>Administrar Tutores</h4>
                        <a href="{{ route('tutores.index') }}">Ver Tutores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection