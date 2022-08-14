@extends('layouts.app')

@section('title')
    Perfil: {{ '@' . $user->username }}
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img 
                    src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}" 
                    class="img-responsive img-profile rounded-full border border-gray-100 shadow-sm" alt="Foto perfil"
                >
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl">{{ '@' . $user->username }}</p>

                    @auth
                        @if ($user->id == auth()->user()->id)
                            <a 
                                href="{{ route('perfil.index') }}"
                                class="text-gray-500 hover:text-gray-600 cursor-pointer"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        @endif
                    @endauth   
                </div> 

                <p class="text-gray-800 text-sm mb-3 font-bold mt-3">
                    {{ $user->followers->count() }}
                    <span>@choice('Seguidor|Seguidores', $user->followers->count())</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->following->count() }}
                    <span>Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }}
                    <span>Posts</span>
                </p>

                @auth
                    @if ($user->id != auth()->user()->id)
                        @if (!$user->isFollowing(auth()->user()))
                            <form
                                method="post"
                                action="{{ route('users.follow', $user) }}"
                            >
                                @csrf
                            <input 
                                type="submit"
                                value="Seguir"
                                class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                            >
                            </form>
                        @else
                            <form
                                method="post"
                                action="{{ route('users.unfollow', $user) }}"
                            >
                                @csrf
                                @method('DELETE')
                            <input 
                                type="submit"
                                value="Dejar de Seguir"
                                class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                            >
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', [
                            'post' => $post,
                            'user' => $user
                        ]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="'Imagen del post' {{ $post->title }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-600 text-center uppercase font-bold text-sm">No hay posts</p>
        @endif
    </section>

@endsection