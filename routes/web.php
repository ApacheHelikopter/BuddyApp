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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@handleRegister');

Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@handleLogin');


Route::post('/buddies', 'BuddiesController@store');

Route::get('/buddies', 'BuddiesController@index');
Route::get('/buddies/{buddy}', 'BuddiesController@show');
Route::get('/buddies/create', 'BuddiesController@create');
