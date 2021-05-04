<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function home() {
        if(auth()->guest()) {
            flash('Vous devez être connecté pour voir cette page.')->error();
            return redirect('/signin');
        }
        return view('/account');
    }

    public function logout() {
        auth()->logout();
        flash("Vous êtes maintenant déconnecté.")->success();
        return redirect('/signin');
    }

    public function updatePassword() {
        if(auth()->guest()) {
            flash('Vous devez être connecté pour voir cette page.')->error();
            return redirect('/signin');
        }

        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        auth()->user()->update([
            'password' => bcrypt(request('password'))
        ]);

        flash("Votre mot de passe a bien été mis à jour.")->success();

        return redirect('/account');
    }
}
