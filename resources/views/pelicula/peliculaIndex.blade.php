@extends('layouts.principal')
@section('contenido')
<h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Películas disponibles
</h2>
<div>
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('pelicula.create') }}">
            Agregar nueva Película
        </a>
    </h4>
</div>
@foreach($peliculas as $pelicula)
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
        <img src="{{ $pelicula-> imagen }}" width="150" class="p-2 mr-3">
        <div class="w-full">
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                <a href="{{ route('pelicula.show', $pelicula->id) }}">{{ $pelicula-> nombre }}</a> 
            </p>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Duración en minutos: {{ $pelicula-> duracion }} 
            </p>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Año de salida: {{ $pelicula-> year }}
            </p>
            <p class="text-gray-700 dark:text-gray-400 min-w-2x1 mt-4">
                {{ $pelicula-> descripcion }}
            </p> 
        </div>
        <div class="flex items-center space-x-4 text-sm align-middle w-1/3">
            <a
            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
            aria-label="Edit" href="{{ route('pelicula.edit', $pelicula) }}">            
            <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                ></path>
            </svg>
            </a>
            <button
            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
            aria-label="Delete">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            </button> 
            <!--
            <button
                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                aria-label="Delete">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>  
            </button>-->

            <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-2"
                href="">
                Ver Reviews
            </a>
        </div>
    </div>
@endforeach
@endsection