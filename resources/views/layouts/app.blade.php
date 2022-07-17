<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Devstagram</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
       
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    DevStagram
                </h1>

                <nav class="flex gap-4">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register.index') }}">Crear Cuenta</a>
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
       
    </body>
</html>
