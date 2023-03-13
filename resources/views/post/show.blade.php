@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('Contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads' . '/' . $post->imagen) }}" alt="Imagen {{ $post->titulo }}">
            <div class="p-3">
                0 Likes
            </div>
            <div>
                <p class="font-bold capitalize">{{ $post->user->username }}</p>
                <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow-xl bg-white p-5 mb-5">
                <div class="">
                    @foreach ($post->comentarios as $comentario)
                    @endforeach
                </div>
                @auth
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <textarea name="comentario" id="comentario" placeholder="Agrega un Comentario"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-xs p-2 text-center uppercase">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <input type="submit" value="Publicar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                    </form>
                @endauth

            </div>
        </div>
    </div>
@endsection
