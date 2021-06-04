<?php

namespace App\Http\Controllers;

use DB;

class ArchivedController extends Controller
{
    public function all() {
        $cakes = DB::table('cakes')->orderBy('DeliveryDate', 'asc')->get();
        return view('/products', [
            'cakes' => $cakes,
            'archived' => true
        ]);
    }
}
