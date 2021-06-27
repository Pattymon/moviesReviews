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

<!--Actores-->
    <div class="flex items-center p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
        <div>
          <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
            Actores/Actrices
          </p>
            @foreach ($pelicula->actores as $actor)
            <div class="flex items-center p-2 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-4">
              <img src="{{ $actor->imagen }}" width="150" class="p-2 mr-3">
              <div class="w-full">
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $actor->nombre }}</p>
                <p class="text-gray-700 dark:text-gray-400 min-w-2x1 mt-4">{{ $actor->descripcion }}</p>
              </div>
            </div>
            @endforeach
          <form action="{{ route('pelicula.agregar-actor', $pelicula) }}" method="POST">
            @csrf
            <label class="block pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-800 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <span class="text-gray-700 dark:text-gray-400">
                    Agregue un actor, si no lo encuentra registrelo y seleccionelo
                </span>                  
                <select 
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                    multiple
                    name="actor_id[]">
                    @foreach ($actores as $actor)
                      <option value="{{ $actor->id }}" {{ array_search($actor->id, $pelicula->actores->pluck('id')->toArray()) !== false ? 'selected' : '' }}>{{ $actor->nombre }}</option>
                    @endforeach
                </select>
            </label>
            <input
              class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mt-4"
              type="submit" 
              value="Actualizar Actores" 
            />
          </form>
          <a @click="openModal" 
          class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mt-4"
          href="#">
                      Agregar Nuevo Actor
          </a>
        </div>
    </div>
    @can('delete', $pelicula)
    <form action="{{ route('pelicula.destroy', $pelicula) }}" method="POST" class="mt-4">
        @csrf
        @method('DELETE')
        <input
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit" 
            value="Eliminar Pelicula"
            />
    </form>
    @endcan

<!--Modal para agregar un actor-->
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
          <a class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal"
          href="#">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
              <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
          </a>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
          <!-- Modal title -->
          <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
            Agregar Actor nuevo
          </p>
          <!-- Modal description -->
          <form action="{{ route('pelicula.nuevo-actor', $pelicula) }}" method="POST">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nombre de la Película</span>
                <input
                    @error('nombre')
                        class="block w-full mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                    @enderror 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text"
                    name="nombre" 
                    id="nombre"
                    value="{{ old('nombre') ?? '' }}" 
                    />
                @error('nombre')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Imagen (URL):</span>
                <input
                    @error('imagen')
                        class="block w-full mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                    @enderror 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    type="text" 
                    name="imagen" 
                    id="imagen" 
                    value="{{ old('imagen') ?? '' }}"
                    />
                @error('imagen')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Descripción de la película (coloca una breve sinopsis):</span>
                <textarea
                    @error('descripcion')
                        class="block w-full mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                    @enderror 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="descripcion" 
                    rows="6" cols="15" 
                    id="descripcion"
                >
                    {{ old('descripcion') ?? '' }}
                </textarea>
                @error('descripcion')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                @enderror
            </label>
        </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
              <a @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
              href="#">
                Cancelar
              </a>
              <input
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit" 
                value="Guardar" 
                />
            </footer>
          </form>
      </div>
    </div>
@endsection