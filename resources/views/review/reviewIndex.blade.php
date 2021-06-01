@extends('layouts.temp')
@section('contenido')
    <h1>Listado de Reviews</h1>

    <table border ="1">
        <thead>
            <th>ID</th>
            <th>ID User</th>
            <th>ID Pelicula</th>
            <th>Valoracion</th>
            <th>Fecha de Publicacion</th>
            <th>Reseña</th>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review-> id }}</td>
                    <td>{{ $review-> idUser }}</td>
                    <td>{{ $review-> idPelicula }}</td>
                    <td>{{ $review-> valoracion }}</td>
                    <td>{{ $review-> fechaPublicacion }}</td>
                    <td>{{ $review-> resena }}</td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection