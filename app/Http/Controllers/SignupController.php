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
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ], [
            'password.min' => 'Pour des raisons de sécurité, votre mot de passe doit faire :min caractères.'
        ]);
    
        $user  = User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        
        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($resultat) {
            flash('Vous êtes à présent enregistré et connecté.')->success();
            return redirect('/');
        }

        return view('/');
    }
}
