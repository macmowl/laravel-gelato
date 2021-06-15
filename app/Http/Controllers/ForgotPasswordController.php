<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{
    public function getEmail() {
        return view('forgot-password');
    }

    public function postEmail(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('customauth.verify', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Réinitialisation du mot de passe');
        });
        flash('Un lien pour réinitialiser votre mot de passe vous a été envoyé.')->success();
        return redirect('/signin');
    }
}
