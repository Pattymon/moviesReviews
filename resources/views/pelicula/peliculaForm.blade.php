@extends('layouts.temp')
@section('contenido')
    <h1>Formulario de Peliculas</h1>

    <p>
        <a href="{{ route('pelicula.index') }}"> Lista de Películas </a>
    </p>

    @if(isset($pelicula))
        {{-- Edicion de Película --}}
        <form action="{{ route('pelicula.update', $pelicula) }}" method="POST">
            @method('PATCH')
    @else
        {{-- Creación de Película --}}
        <form action="{{ route('pelicula.store') }}" method="POST">
    @endif
            @csrf
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $pelicula->nombre ?? '' }}">
            <br>

            <label for="duracion">Duración:</label>
            <input type="text" name="duracion" id="duracion" value="{{ $pelicula->duracion ?? '' }}">
            <br>

            <label for="year">Año:</label>
            <input type="text" name="year" id="year" value="{{ $pelicula->year ?? '' }}">
            <br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" rows="20" cols="40" id="descripcion">{{ $pelicula->descripcion ?? '' }}</textarea>
            <br>

            <label for="fechaPublicacion">Fecha de Publicación (AAAA-MM-DD):</label>
            <input type="text" name="fechaPublicacion" id="fechaPublicacion" value="{{ $pelicula->fechaPublicacion ?? '' }}">
            <br>

            <label for="imagen">Imagen (URL):</label>
            <input type="text" name="imagen" id="imagen" value="{{ $pelicula->imagen ?? '' }}">
            <br>

            <input type="submit" value="Guardar">

        </form>
@endsection