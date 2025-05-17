<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function index(){
        return view('auth.register');
    }
   public function store()
    {
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'email'      => ['required', 'email', 'unique:users,email'],
            'password'   => ['required', Password::default(), 'confirmed'],
        ]);

    $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/courses')->with('message', 'User registered!');;
    }
}
