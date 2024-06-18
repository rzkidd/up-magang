<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register_index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:4|max:12'
        ]);

        $validated['password'] = md5($validated['password']);

        User::create($validated);

        return redirect('/login')->with('success', 'Account created!');
    }

    public function login_index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        dd($validated);
        Auth::attempt($validated);

        return redirect('/');
    }
}
