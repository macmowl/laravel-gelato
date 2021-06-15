<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;

class ResetPasswordController extends Controller
{
    public function getPassword($token) {
         return view('customauth.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
      {

      $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
         ]);
        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if(!$updatePassword)
        return back()->withInput()->with('error', 'Invalid token!');

        $user = User::where('email', $request->email)
             ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        flash('Votre mot de passe a été mis à jour.')->success();
        return redirect('/signin')->with('message', 'Your password has been changed!');

    }
}
