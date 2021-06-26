@extends('layouts.principal')
@section('contenido')
<h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Archivos
</h2>
@foreach($archivos as $archivo)
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
        <div class="w-full">
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $archivo->user->nombre_original }}
            </p>
        </div>
        <div class="flex items-center space-x-4 text-sm align-middle w-1/3">
            <a href="#">Descargar</a>
        </div>
    </div>
@endforeach
@endsection