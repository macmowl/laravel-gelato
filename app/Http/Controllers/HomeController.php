<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        if(auth()->guest()) {
            flash('Vous devez être connecté pour voir cette page.')->error();
            return redirect('/signin');
        }
        return view('/products');
    }
}
