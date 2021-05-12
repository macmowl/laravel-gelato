<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;

class HomeController extends Controller
{
    public function home() {

        $cakes = Cake::all();
        return view('/products', [
            'cakes' => $cakes
        ]);
    }
}
