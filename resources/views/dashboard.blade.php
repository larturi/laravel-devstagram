@extends('layouts.app')

@section('title')
    Perfil: {{ '@' . $user->username }}
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" class="img-responsive img-profile" alt="Foto perfil">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <p class="text-gray-700 text-2xl">{{ '@' . $user->username }}</p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-3">
                    0
                    <span>Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span>Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span>Posts</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a>
                        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="'Imagen del post' {{ $post->title }}">
                    </a>
                </div>
            @endforeach
        </div>
    </section>

@endsection