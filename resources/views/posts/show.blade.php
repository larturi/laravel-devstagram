@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container mx-auto flex">
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
                <form>
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                            Agrega un comentario:
                        </label>
                        <textarea 
                            type="text"
                            id="comentario"
                            name="comentario"
                            class="border p-3 w-full rounded-md @error('comentario') border-red-500 @enderror"
                        >
                            {{ old('comentario') }}
                        </textarea>
                    </div>
                    
                    <input 
                    type="submit"
                    value="Enviar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                            uppercase font-bold w-full p-3 text-white runded-md"
                />
                </form>
            </div>

        </div>
    </div>
@endsection