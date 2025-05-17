<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    public function index (){
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Prevent session fixation
            return redirect()->intended('/')->with('message', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials. does not match with email',
        ])->onlyInput('email');
    }

    public function destroy (){
        Auth::logout();

        return redirect('/');
    }
}
