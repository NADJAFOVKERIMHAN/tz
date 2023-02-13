<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::post('/registration', 'App\Http\Controllers\AuthenticationController@create')->name('registration');

Route::get('/accounts/{accountId}', 'App\Http\Controllers\UsersController@info');

Route::get('/', function(){
    return view('welcome');
});

