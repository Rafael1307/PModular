@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestor Adlr</title>
    <link rel="profile" type="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg">

    <!-- Scripts -->
    <script src="{{ asset('js/Home.js') }}" defer></script>
    <script src="{{ asset('js/Home.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/maestros/maestros.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
    <div class="container">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Lista de Maestros</h1>
                <a href="{{ route('maestros.create') }}" class="btn btn-primary">Crear Maestro</a>
            </div>

        

        <div class="row">
            @foreach($maestros as $maestro)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Foto del Maestro -->
                            <a href="{{ route('maestros.show', $maestro->id) }}">
                            <div class="text-center">
                                @if($maestro->foto)
                                    <img src="{{ asset('storage/' . $maestro->foto) }}" alt="{{ $maestro->nombre }}" class="img-fluid rounded-circle" style="max-width: 150px; max-height: 150px;">
                                @else
                                    <img src="{{ asset('images/default-avatar.jpg') }}" alt="Foto por defecto" class="img-fluid rounded-circle" style="max-width: 150px; max-height: 150px;">
                                @endif
                            </div>
                            </a>

                            <!-- Datos del Maestro -->
                            <div class="mt-3">
                                <h4>{{ $maestro->nombre }} {{ $maestro->apellido }}</h4>
                                <p>Correo: {{ $maestro->correo }}</p>
                                <p>Teléfono: {{ $maestro->telefono }}</p>

                                <!-- Otras opciones sobre el maestro -->
                                <div class="mt-3">
                                    <!-- Coloca aquí los enlaces a otras acciones (editar, eliminar, etc.) -->

                                    <form action="{{ route('maestros.destroy',$maestro->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('maestros.edit',$maestro->id) }}">Editar</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary"  onclick="return confirm('¿Estás seguro?')"> Borrar</button>
                                    </form>


                                    
                                    <!-- Agrega más enlaces según sea necesario -->
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ url('/home')}}" class="btn btn-primary">Volver</a>
    </div>
@endsection