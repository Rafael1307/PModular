@extends('layouts.app')

@section('content')
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