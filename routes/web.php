<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@home');
Route::get('/account', 'App\Http\Controllers\AccountController@home');
Route::get('/logout', 'App\Http\Controllers\AccountController@logout');
Route::post('/update-password', 'App\Http\Controllers\AccountController@updatePassword');

Route::post('/add-product', 'App\Http\Controllers\ProductController@add');


Route::get('/signup', 'App\Http\Controllers\SignupController@form');
Route::post('/signup', 'App\Http\Controllers\SignupController@execution');

Route::get('/signin', 'App\Http\Controllers\SigninController@form');
Route::post('/signin', 'App\Http\Controllers\SigninController@execution');
