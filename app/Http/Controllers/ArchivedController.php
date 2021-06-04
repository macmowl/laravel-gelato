<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;

class ArchivedController extends Controller
{
    public function all() {
        session(['archived' => true]);
        $cakes = DB::table('cakes')->orderBy('DeliveryDate', 'asc')->get();
        return view('/products', [
            'cakes' => $cakes,
            'archived' => session('archived')
        ]);
    }
}
