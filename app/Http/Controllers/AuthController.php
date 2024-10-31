<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store() {
        $validated = request()->validate([
            'name' => 'required|min:5|max:45',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('dashboard')->with('success', 'Account created Successfully');
    }

    public function login() {
        return view('auth.login');
    }

    public function authenticate() {
        $validated = request()->validate([
            'email'=> 'required|email',
            'password' => 'required|min:6'
        ]);


        if(Auth::attempt($validated)) {

            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Login Successfull');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching email and password found'
        ]);
    }

}
