@extends('layouts.app')

@section('title')
    Usuarios
@endsection

@section('content')
    <div class="md:flex md:justify-center gap-2">

        <div class="md:w-1/2 bg-white shadow p-6">
            <h1 class="bg-gray-700 text-white px-3 py-2 rounded-md text-sm font-medium">Seguir</h1>

            @if ($allUsers->count() == 0)
                <p class="text-center mt-6">No hay nuevos usuarios para seguir</p>
            @else
                @foreach ($allUsers as $user)
                    <div class="bg-white shadow mb-5 mt-5 overflow-y-scroll lg:flex lg:justify-between gap-2">
                        <div class="my-2 ml-2 p-2 flex justify-between gap-2">
                            <img 
                                src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}" 
                                class="w-3/12 img-responsive img-profile rounded-full" alt="Foto perfil"
                            >

                            <div class="w-9/12 my-2 ml-2 p-2">
                                <a class="font-bold">
                                    {{ '@' . $user->username }}
                                </a>
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        
                        <div class="w-12/12 my-2 ml-2 p-1 mr-5">
                            <form
                                method="post"
                                action="{{ route('users.follow', $user) }}"
                            >
                                @csrf
                                <input 
                                    type="submit"
                                    value="Seguir"
                                    class="bg-blue-600 lg:mt-10 w-full text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                >
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="md:w-1/2 bg-white shadow p-6 mb-4">
            <h1 class="bg-gray-700 text-white px-3 py-2 rounded-md text-sm font-medium">Siguiendo</h1>

            @if ($siguiendoUsers->count() == 0)
               <p class="text-center mt-6">Aun no sigues a nadie</p>
            @else
                @foreach ($siguiendoUsers as $siguiendoUser)
                    <div class="bg-white shadow mb-5 mt-5 overflow-y-scroll lg:flex lg:justify-between gap-2">
                        <div class="my-2 ml-2 p-2 flex justify-between gap-2">
                            <img 
                                src="{{ $siguiendoUser->imagen ? asset('perfiles') . '/' . $siguiendoUser->imagen : asset('img/usuario.svg') }}" 
                                class="w-3/12 img-responsive img-profile rounded-full" alt="Foto perfil"
                            >
    
                            <div class="w-9/12 my-2 ml-2 p-2">
                                <a class="font-bold" href="{{ route('posts.index', $siguiendoUser) }}">
                                    {{ '@' . $siguiendoUser->username }}
                                </a>
                                <p>{{ $siguiendoUser->email }}</p>
                            </div>
                        </div>
                        
                        <div class="w-12/12 my-2 ml-2 p-1 mr-5">
                            <form
                                method="post"
                                action="{{ route('users.unfollow', $siguiendoUser) }}"
                            >
                                @csrf
                                @method('DELETE')
                                <input 
                                    type="submit"
                                    value="Dejar de Seguir"
                                    class="bg-red-600 lg:mt-10 w-full text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                >
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
         </div>
    </div>
@endsection