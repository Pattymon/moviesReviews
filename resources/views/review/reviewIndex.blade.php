@extends('layouts.principal')
@section('contenido')
    <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Listado de Reviews
    </h2>

    @if(isset($pelicula))
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    href="{{ route('review.nuevo', $pelicula) }}">
                    Agregar Review
                </a>
            </h4>
        </div>
    @endif

@foreach($reviews as $review)
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
        <div class="w-full">
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                @foreach ($users as $user)
                    @if ($review->user_id == $user->id)
                        {{ $user->name }}
                    @endif
                @endforeach
            </p>
            <p class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
               -> {{ $review->valoracion }} 
            </p>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                @foreach ($peliculas as $pelicula)
                    @if ($review->pelicula_id == $pelicula->id)
                        {{ $pelicula->nombre }}
                    @endif
                @endforeach
            </p>
            <p class="text-gray-700 dark:text-gray-300 min-w-2x1 mt-4">
            {{ $review-> resena }}
            </p> 
        </div>
        <div class="flex items-center space-x-4 text-sm align-middle w-1/3">
            @can('update', $review)
                <form action="{{ route('review.destroy', $review) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <input
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit" 
                    value="Eliminar Review"
                    />
                </form>
            @endcan
        </div>
    </div>
@endforeach
@endsection
