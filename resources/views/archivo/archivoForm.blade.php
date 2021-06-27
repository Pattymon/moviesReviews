@extends('layouts.principal')
@section('contenido')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Carga de archivos
    </h4>
    <div class="px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Seleccione el archivo a cargar</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="file" name="archivo" id="archivo" 
                    />
            </label>
        <!--Boton Guardar -->
            <div class="px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <input
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit" 
                    value="Cargar" 
                    />
            </div>
        </form>
    </div>
@endsection