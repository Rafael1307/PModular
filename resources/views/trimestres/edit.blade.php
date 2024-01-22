@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Trimestre</h1>

        <form action="{{ route('trimestres.update', $trimestre->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="trimestre">Trimestre:</label>
                <input type="text" name="trimestre" class="form-control" value="{{ $trimestre->trimestre }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Trimestre</button>
        </form>
    </div>
@endsection

