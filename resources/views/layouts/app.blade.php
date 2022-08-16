<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @stack('styles')

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        @if(str_contains(Request::url(), '/posts/create'))
          @vite('resources/js/dropzone.js')
        @endif

        @livewireStyles

        <title>Laravel Devstagram</title>
    </head>
    <body class="bg-gray-100">
       
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center menu">
                <a href="{{ route('home') }}" class="text-3xl font-black logo">
                    DevStagram
                </a>

                <nav class="flex gap-4 items-center">
                    @auth
                        <a 
                            class="font-bold text-gray-600 text-sm item-menu username"
                            href="{{ route('posts.index', auth()->user()->username) }}"
                        >
                            Hola
                            <span class="font-normal">{{ '@' . auth()->user()->username }}</span>
                        </a>

                        <a 
                            href="{{ route('posts.create') }}"
                            class="flex items-center gap-2 bg-white border p-2 text-gray-600 button-menu rounded text-sm uppercase font-bold cursor-pointer"
                        >
                            {{-- https://heroicons.com/ --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Crear
                        </a>

                        <form method="POST" action={{ route('logout') }}>
                            @csrf
                            <button 
                                class=" flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
                                type="submit"
                            >
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                              </svg>
                                Cerrar Sesión
                            </button>
                        </form>
                    @else
                        <a class="font-bold uppercase item-navbar text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                        <a class="font-bold uppercase item-navbar text-gray-600 text-sm" href="{{ route('register.index') }}">Crear Cuenta</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="text-3xl font-black text-center mb-10">@yield('title')</h2>
            @yield('content')
        </main>

        <footer class="text-center p-5 text-gray-500 mt-16">
            DevStagram - Todos los derechos reservados ({{ now()->year }})
        </footer>

        @livewireScripts
       
    </body>
</html>
