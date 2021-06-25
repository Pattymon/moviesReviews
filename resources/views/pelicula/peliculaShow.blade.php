@extends('layouts.principal')
@section('contenido')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Detalles de la Pelicula
    </h4>
    <div>
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="{{ route('pelicula.index') }}">
                Lista de Películas
            </a>
        </h4>
    </div>         
    <div class="flex justify-center p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
        <img src="{{ $pelicula-> imagen }}"  width="400" class="justify-center">
    </div>
    <div class="flex items-center p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
        <div>
          <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
            {{ $pelicula-> nombre }}
          </p>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Duración en minutos: {{ $pelicula-> duracion }} 
          </p>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Año de salida: {{ $pelicula-> year }}
          </p>
          <p class="text-gray-700 dark:text-gray-300">
            {{ $pelicula-> descripcion }}
          </p>
        </div>
    </div>
    <div class="flex items-center p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
        <div>
          <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
            Actores
          </p>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Nombre
          </p>
          <p class="text-gray-700 dark:text-gray-400">
            Descripción
          </p>
        </div>
    </div>
    <div class="flex items-center p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
        <div>
          <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
            Directores
          </p>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Nombre
          </p>
          <p class="text-gray-700 dark:text-gray-400">
            Descripción
          </p>
        </div>
    </div>
    
    <form action="{{ route('pelicula.destroy', $pelicula) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <input
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit" 
            value="Eliminar Pelicula"
            />
    </form>
@endsection