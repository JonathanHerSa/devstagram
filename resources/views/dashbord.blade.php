@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('Contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen Usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center py-10 md:py-10 md:items-start md:justify-center">
                <p class="text-gray-700 text-2xl capitalize">{{ $user->username }}</p>
                <p class="mt-5 text-gray-800 txt-sm mb-3 font-bold">
                    0 <span class="font-normal">Seguidores</span>
                </p>
                <p class="text-gray-800 txt-sm mb-3 font-bold">
                    0 <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 txt-sm mb-3 font-bold">
                    0 <span class="font-normal">Post</span>
                </p>
            </div>
        </div>
    </div>
    <section class="container mt-10 mx-auto">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if ($posts->count())
            <div class="grid justify-center grid-cols-3 xl:grid-cols-4 gap-[0.05rem] md:gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}"><img
                                src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Post {{ $post->titulo }}"></a>
                    </div>
                @endforeach
            </div>
        @else
            <div>
                <p class="text-center text-gray-600/50 text-sm uppercase font-bold">Aun no has creado ninguna publicacion
                </p>
            </div>
        @endif
    </section>
@endsection
