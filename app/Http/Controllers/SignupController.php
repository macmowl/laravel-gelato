<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{
    public function form () {
        return view('signup');
    }

    public function execution () {
        request()->validate([
            'email' => ['required', 'email'],
            'username' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ], [
            'password.min' => 'Pour des raisons de sécurité, votre mot de passe doit faire :min caractères.'
        ]);

        $user  = User::create([
            'email' => request('email'),
            'username' => request('username'),
            'password' => bcrypt(request('password')),
        ]);

        if ($user) {
            flash('Vous avez enregistré un nouvel utilisateur (' . request('email') . ')')->success();
            return redirect('/');
        }

        return view('/');
    }
}
