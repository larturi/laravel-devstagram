@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" class="img-post" alt="Imagen del post {{ $post->title }}">

            <div>
                <p class="p-3">0 likes</p>   
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">{{ $post->description }}</p>
            </div>
        </div>

        <div class="md:w-1/2 p-5">

            <div class="shadow bg-white p-5 mb-5">

                @auth

                    @if(session('msg'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session('msg') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Agrega un comentario:
                            </label>
                            <textarea 
                                type="text"
                                id="comentario"
                                name="comentario"
                                class="border p-3 w-full rounded-md @error('comentario') border-red-500 @enderror"
                            >{{ old('comentario') }}</textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-md text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <input 
                        type="submit"
                        value="Enviar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                                uppercase font-bold w-full p-3 text-white runded-md"
                    />
                    </form>
                @endauth
            </div>

        </div>
    </div>
@endsection