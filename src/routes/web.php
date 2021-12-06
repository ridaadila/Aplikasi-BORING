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
    return view('boring/home');
})->name('home');

Route::get('/layout', function () {
    return view('layout/layout');
});

Route::get('/login', function () {
    return view('boring/login-register');
});
