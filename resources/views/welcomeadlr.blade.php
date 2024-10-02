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
    <script src="{{ asset('js/Adlr.js') }}" defer></script>
    <script src="{{ asset('js/Adlr.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/Adlr.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/Adlr.css') }}" rel="stylesheet">
    
    <link rel="icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="https://colegioagustindelarosa.edu.mx/wp-content/uploads/2023/07/cropped-logo-45x52.jpg" type="image/x-icon">
</head>
<div class="container1">
    <h1>Enseñar es dar alas para volar</h1>
    <div class="bird-container bird-container--one">
        <div class="bird bird--one"></div>
    </div>
    <div class="bird-container bird-container--two">
        <div class="bird bird--two"></div>
    </div>
    <div class="bird-container bird-container--three">
        <div class="bird bird--three"></div>
    </div>
    <div class="bird-container bird-container--four">
        <div class="bird bird--four"></div>
    </div>
</div>


@endsection