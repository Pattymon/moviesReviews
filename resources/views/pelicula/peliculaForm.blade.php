@extends('layouts.principal')
@section('contenido')

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Formulario para Película
    </h4>
    <div>
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="{{ route('pelicula.index') }}">
                Lista de Películas
            </a>
        </h4>
    </div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @if(isset($pelicula))
        {{-- Edicion de Película --}}
        <form action="{{ route('pelicula.update', $pelicula) }}" method="POST">
            @method('PATCH')
    @else
        {{-- Creación de Película --}}
        <form action="{{ route('pelicula.store') }}" method="POST">
    @endif
    
    @csrf

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre de la Película</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                name="nombre" 
                id="nombre" 
                value="{{ $pelicula->nombre ?? '' }}"
                />
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Duración en minutos:</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text" 
                name="duracion" 
                id="duracion" 
                value="{{ $pelicula->duracion ?? '' }}"
                />
        </label>
        
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Año de salida:</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text" 
                name="year" 
                id="year" 
                value="{{ $pelicula->year ?? '' }}"
                />
        </label>
        
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Descripción de la película (coloca una breve sinopsis):</span>
            <textarea
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="descripcion" 
                rows="20" cols="40" 
                id="descripcion"
            >
                {{ $pelicula->descripcion ?? '' }}
            </textarea>
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Fecha de Publicación (AAAA-MM-DD):</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text" 
                name="fechaPublicacion" 
                id="fechaPublicacion" 
                value="{{ $pelicula->fechaPublicacion ?? '' }}"
                />
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Imagen (URL):</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text" 
                name="imagen" 
                id="imagen" 
                value="{{ $pelicula->imagen ?? '' }}"
                />
        </label>

        <div class="mt-4">
            <input
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit" 
                value="Guardar" 
                />
        </div>

        </form>
    </div>
@endsection