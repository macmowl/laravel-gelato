<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;
use DB;

class HomeController extends Controller
{
    public function home() {
        $today = date("Y-m-d H:i");
        session(['archived' => false]);
        $cakes = DB::table('cakes')->where('DeliveryDate', '>=', $today)->orderBy('DeliveryDate', 'asc')->get();
        return view('/products', [
            'cakes' => $cakes,
            'archived' => session('archived')
        ]);
    }
}
