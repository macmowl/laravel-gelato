<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SigninController extends Controller
{
    public function form() {
        return view('signin');
    }

    public function execution() {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $result = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ], true);

        if($result) {
            flash("Vous êtes maintenant connecté.")->success();
            return redirect('/');
        }

        return back()->withInput()->withErrors([
            'email' => 'Les identifiants sont incorrects'
        ]);
    }
}
