@extends('layouts.app')

@section('title')
    Crea una nueva publicación
@endsection

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2">
            Imagen aqui
        </div>
        <div class="md:w-1/2 rounded-lg bg-white shadow-lg m-5 md:m-0 p-7 mt-10 md:mt-0">
            <form action="{{ route('register.store') }}" method="post" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input 
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Titulo de la publicacion"
                        class="border p-3 w-full rounded-md @error('title') border-red-500 @enderror"
                        value="{{ old('title') }}"
                    >
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-md text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea 
                        type="text"
                        id="description"
                        name="description"
                        placeholder="Descripción de la publicacion"
                        class="border p-3 w-full rounded-md @error('description') border-red-500 @enderror"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="bg-red-500 text-white my-2 rounded-md text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input 
                    type="submit"
                    value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                            uppercase font-bold w-full p-3 text-white runded-md"
                />
            </form>
        </div>
    </div>
@endsection