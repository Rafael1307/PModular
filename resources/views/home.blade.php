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
    <h1>Elige tu Rol</h1>

    <form action="/choose-role" method="post">
        @csrf
        <label for="role">Selecciona tu Rol:</label>
        <select name="role" id="role">
            <option value="1">Maestro</option>
            <option value="2">Directivo</option>
            <option value="3">Administrativo</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
@endsection