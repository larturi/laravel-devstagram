@extends('layouts.app')

@section('title')
    Inicia Sesion en DevStagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img class="img-responsive rounded-md" src="{{ asset('img/login.jpg') }}" alt="Login">
        </div>
        <div class="md:w-4/12 p-6 rounded-lg bg-white shadow-lg m-5 md:m-0">
            <form novalidate method="POST" action="{{ route('login.store') }}">
                @csrf

                @if (session('message'))
                   <p class="bg-red-500 text-white my-2 rounded-md text-sm p-2 text-center mb-4">{{ session('message') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        type="text"
                        id="email"
                        name="email"
                        placeholder="Tu correo electronico"
                        class="border p-3 w-full rounded-md @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-md text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Tu contraseña"
                        class="border p-3 w-full rounded-md @error('password') border-red-500 @enderror"
                        value="{{ old('password') }}"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-md text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label class=" text-sm text-gray-500">Mantener mi sesión abierta</label>
                </div>

                <input 
                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                            uppercase font-bold w-full p-3 text-white runded-md"
                >
            </form>
        </div>
    </div>
@endsection