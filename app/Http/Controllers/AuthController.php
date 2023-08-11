<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function store(){
        $validated = request()->validate([
            'name'=> 'required|min:3| max:40',
            // validate email from the users table simple way
            'email'=> 'required|email|unique:users, email',
            'password'=> 'required|confirmed'
        ]);
        $users = User::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'password'=> Hash::make($validated['password']),
        ]);

        return redirect()->route('dashboard')->with('success', 'user created success fully');
    }

    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    public function authenticate(){
        $validated = request()->validate([
            // validate email from the users table simple way
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        
        if (Auth::attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }
        return redirect()->route('login')->withError([
            'email'=> 'No matching user found with the provided email and password'
        ]);

    }
}
