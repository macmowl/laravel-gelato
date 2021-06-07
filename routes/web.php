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

Route::get('/signin', 'App\Http\Controllers\SigninController@form');
Route::post('/signin', 'App\Http\Controllers\SigninController@execution');



Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function() {

    Route::get('/signup', 'App\Http\Controllers\SignupController@form');
    Route::post('/signup', 'App\Http\Controllers\SignupController@execution');

    Route::get('/account', 'App\Http\Controllers\AccountController@home');
    Route::get('/logout', 'App\Http\Controllers\AccountController@logout');
    Route::post('/update-password', 'App\Http\Controllers\AccountController@updatePassword');

    Route::get('/new-cake', 'App\Http\Controllers\ProductController@home');
    Route::post('/add-cake', 'App\Http\Controllers\ProductController@add');

    Route::post('/update-status/{status}', 'App\Http\Controllers\ProductController@updateStatus');

    Route::get('/cakes/{id}/delete', 'App\Http\Controllers\ProductController@delete');
    Route::get('/cakes/{id}/edit', 'App\Http\Controllers\ProductController@edit');
    Route::post('/edit-cake', 'App\Http\Controllers\ProductController@update');

    Route::get('/archived', 'App\Http\Controllers\ArchivedController@all');

    Route::get('/cakes/{id}', 'App\Http\Controllers\ProductController@showOne');
    Route::get('/', 'App\Http\Controllers\HomeController@home');
});

