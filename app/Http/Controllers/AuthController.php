<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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



        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        Mail::to($user->email)
        ->send(new WelcomeEmail($user));

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

    public function logout() {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logout Successful');

    }

}
