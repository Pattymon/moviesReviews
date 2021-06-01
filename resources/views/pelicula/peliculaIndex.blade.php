@extends('layouts.temp')
@section('contenido')
    <h1>Listado de Peliculas</h1>

    <p>
        <a href="{{ route('pelicula.create') }}"> Agregar Película </a>
    </p>

    <table border ="1">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Duración</th>
            <th>Año</th>
            <th>Descripciónn</th>
            <th>Fecha de publicación</th>
            <th>Imagen</th>
            <th>Acciones</th>

        </thead>
        <tbody>
            @foreach($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula-> id }}</td>
                    <td>
                        <a href="{{ route('pelicula.show', $pelicula->id) }}">{{ $pelicula-> nombre }}</a> 
                    </td>
                    <td>{{ $pelicula-> duracion }}</td>
                    <td>{{ $pelicula-> year }}</td>
                    <td>{{ $pelicula-> descripcion }}</td>
                    <td>{{ $pelicula-> fechaPublicacion }}</td>
                    <td>
                        <img src="{{ $pelicula-> imagen }}" width="150" height="200">
                    </td>
                    <td>
                        <a href="{{ route('pelicula.edit', $pelicula) }}">Editar</a> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection