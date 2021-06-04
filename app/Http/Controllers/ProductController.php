<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function home() {
        return view('product');
    }

    public function add() {
        request()->validate([
            'nbrPersons' => ['required'],
            'tastes' => ['required'],
            'shape' => ['required'],
        ]);

        auth()->user()->cakes()->create([
            'nbrPersons' => request('nbrPersons'),
            'tastes' => request('tastes'),
            'shape' => request('shape'),
            'vegan' => request('vegan'),
            'decoration' => request('decoration'),
            'specificities' => request('specificities'),
            'status' => request('status'),
            'DeliveryDate' => request('DeliveryDate'),
            'isForDelivery' => request('isForDelivery'),
            'client_name' => request('client_name'),
            'client_phone' => request('client_phone'),
            'client_email' => request('client_email'),
            'price' => request('price'),
            'advance_payment' => request('advance_payment'),
            'user_id' => auth()->id()
        ]);

        flash('Le gâteau a été ajouté.')->success();
        return redirect('/');
    }

    public function update() {
        request()->validate([
            'nbrPersons' => ['required'],
            'tastes' => ['required'],
            'shape' => ['required'],
        ]);

        $id = request('id');

        DB::table('cakes')->where('id', $id)->update([
            'nbrPersons' => request('nbrPersons'),
            'tastes' => request('tastes'),
            'shape' => request('shape'),
            'vegan' => request('vegan'),
            'decoration' => request('decoration'),
            'specificities' => request('specificities'),
            'status' => request('status'),
            'DeliveryDate' => request('DeliveryDate'),
            'isForDelivery' => request('isForDelivery'),
            'client_name' => request('client_name'),
            'client_phone' => request('client_phone'),
            'client_email' => request('client_email'),
            'price' => request('price'),
            'advance_payment' => request('advance_payment'),
            'user_id' => auth()->id()
        ]);

        flash('Le gâteau a correctement été modifié.')->success();
        return redirect('/');
    }

    public function delete() {
        $id = request('id');
        DB::table('cakes')->where('id', $id)->delete();
        flash('Le gâteau a été supprimé')->success();
        return redirect('/');
    }

    public function edit() {
        $id = request('id');
        $cake = Cake::where('id', $id)->firstOrFail();
        return view('edit', [
            'cake' => $cake
        ]);
    }

    public function showOne() {
        $id = request('id');
        $cake = Cake::where('id', $id)->firstOrFail();
        return view('cake', [
            'cake' => $cake,
            'archived' => session('archived')
        ]);
    }

    public function updateStatus() {
        $status = request('status');
        $id = request('id');
        DB::table('cakes')->where('id', $id)->update(['status' => $status]);
        return response()->json(['success' => 'Status mis à jour']);
    }
}
