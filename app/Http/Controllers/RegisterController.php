<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Index()
    {
        return view('auth/register');
    }
    public function store(Request $request)
    {
        //Reescribimos el $request ultimo recurso
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        /* Autenticacion de usuarios */
        /* //Forma 1
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]); */

        //Forma 2
        auth()->attempt($request->only('email', 'password'));

        //Redireccionar
        return redirect()->route('post.index', auth()->user()->username);
    }
}