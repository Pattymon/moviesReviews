@extends('layouts.principal')
@section('contenido')
<h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Archivos
</h2>

    <div class="px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Seleccione el archivo a cargar</span>
                <input type="file" name="archivo" id="archivo"/>
                @error('archivo')
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
                    value="Cargar" 
                    />
            </div>
        </form>
        <hr>
        <br>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Nombre del Archivo</th>
                <th class="px-4 py-3">Acciones</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($archivos as $archivo)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-sm">
                {{ $archivo->nombre_original }}
                </td>
                <td class="px-4 py-3 text-xs">
                <a href="{{ route('archivo.descargar', $archivo) }}">Descargar</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection