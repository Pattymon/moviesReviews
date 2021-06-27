@extends('layouts.principal')
@section('contenido')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Nueva Review para {{ $pelicula->nombre }}
    </h4>
    <div class="px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('review.store') }}" method="POST">
            @csrf
            <input type="hidden" name="pelicula_id" value={{ $pelicula->id }}>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Valoración (Ingresar un numero del 1 al 10)</span>
                <input
                    @error('valoracion')
                        class="block w-full mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                    @enderror 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text"
                    name="valoracion" 
                    id="valoracion" 
                    value="{{ old('valoracion') ?? '' }}"
                    />
                @error('valoracion')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Reseña</span>
                <input
                    @error('resena')
                        class="block w-full mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                    @enderror 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" 
                    name="resena" 
                    id="resena" 
                    value="{{ old('resena') ?? '' }}"
                    />
                @error('resena')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>            

        <!--Boton Guardar -->
            <div class="px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <input
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit" 
                    value="Guardar" 
                    />
            </div>
        </form>
@endsection