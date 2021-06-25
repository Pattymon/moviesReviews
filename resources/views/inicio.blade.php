@extends('layouts.principal')
@section('contenido')
    <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Bienvenido usuario
    </h2>
    
@guest
    <p>
        Recuerda que para poder accesar a la página es necesario estar registrado
    </p>    
    <div class="px-6 my-6">
        <a
        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="{{ route('register') }}"
        >
        Registrarse
        <span class="ml-2" aria-hidden="true">+</span>
        </a>
    </div>
@endguest

    <img src="https://1gwwfg6xmsfmn.cdn.shift8web.com/wp-content/uploads/2020/10/1366_2000.jpg" class="p-2 mr-3">
@endsection