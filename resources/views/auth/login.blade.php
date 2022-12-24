@extends('layouts.app')

@section('titulo')
    Login on DevStagram
@endsection

@section('Contenido')
    <div class="md:flex md:justify-center md:gap-10 p-5 md:items-center">
        <div class="md:w-8/12">
            <img src="{{asset('img/login.jpg')}}" alt="Imagen Login">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST">
                @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-xs p-2 text-center uppercase">{{session('mensaje')}}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" name="email" id="email" placeholder="Tu Email de Registro" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-xs p-2 text-center uppercase">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" name="password" id="password" placeholder="Tu Password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-xs p-2 text-center uppercase">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" id="remember" name="remember"> <label for="remember" class="uppercase text-gray-500 font-bold text-sm">Recuerdame</label>
                </div>
                <input type="submit" value="Inicar Sesion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection