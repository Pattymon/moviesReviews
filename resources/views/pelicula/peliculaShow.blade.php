@extends('layouts.temp')
@section('contenido')
    <h1>Detalles de la Pelicula</h1>

    <p>
        <a href="{{ route('pelicula.index') }}"> Lista de Películas </a>
    </p>

    <table border ="1">
        <thead>
            <th>Imagen</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Duración</th>
            <th>Año</th>
            <th>Descripciónn</th>
            <th>Fecha de publicación</th>
            <th>Actores</th>
            <th>Directores</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <img src="{{ $pelicula-> imagen }}" width="200" height="250">
                </td>
                <td>{{ $pelicula-> id }}</td>
                <td>{{ $pelicula-> nombre }}</td>
                <td>{{ $pelicula-> duracion }}</td>
                <td>{{ $pelicula-> year }}</td>
                <td>{{ $pelicula-> descripcion }}</td>
                <td>{{ $pelicula-> fechaPublicacion }}</td>
            </tr>
        </tbody>
    </table>

    <form action="{{ route('pelicula.destroy', $pelicula) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar Pelicula">
    </form>
@endsection