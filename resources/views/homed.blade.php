@extends('layouts.app')

@section('content')
<style>
        .card {
            background-color: #424549;
            color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .card-header {
            background-color: #424549;
            border-bottom: none;
            padding: 20px;
            font-size: 1.2em;
        }
        .card-body {
            padding: 0 20px 20px;
        }
        .card-body h4 {
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #0c9eec;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 15px;
            width: 15%;
            text-align: center;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: white;
            color: #0c9eec;
        }
        hr {
            border-color: rgba(255,255,255,0.1);
            margin: 20px 0;
        }
        h4 {
            background-color: white;
            color: #424549;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 15px;
            width: 100%;
            text-align: left;
            transition: background-color 0.3s;
        }
    </style>
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