<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        $request->request->add(['username' =>  Str::slug($request->username)]);
        
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'username' => 'required|unique:users|min:6|max:20|alpha_dash',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar User
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
