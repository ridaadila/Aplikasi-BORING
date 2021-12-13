<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\DekorasiController;
use App\Http\Controllers\FotograferController;
use App\Http\Controllers\CateringController;

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
Route::get('/', [BerandaController::class, 'index']);
Route::get('/venue', [VenueController::class, 'index']);
Route::get('/decoration', [DekorasiController::class, 'index']);
Route::get('/photography', [FotograferController::class, 'index']);
Route::get('/catering', [CateringController::class, 'index']);

// Route::get('/', function () {
//     return view('boring/home');
// })->name('home');

Route::get('/login', function () {
    return view('boring/login-register');
})->name('login');

Route::get('/contact', function () {
    return view('boring/contact');
})->name('contact');

Route::get('/about', function () {
    return view('boring/about');
})->name('about');

Route::get('/review', function () {
    return view('boring/review');
})->name('review');

Route::get('/profile', function () {
    return view('boring/customer/profile');
})->name('profile');


// // Vendor
// Route::get('/venue', function () {
//     return view('boring/vendor/venue');
// })->name('venue');

// Route::get('/decoration', function () {
//     return view('boring/vendor/decoration');
// })->name('decor');

// Route::get('/photography', function () {
//     return view('boring/vendor/photography');
// })->name('photo');

// Route::get('/catering', function () {
//     return view('boring/vendor/catering');
// })->name('catering');


// Transaksi
Route::get('/cart', function () {
    return view('transaksi/cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('transaksi/checkout');
})->name('checkout');

// Admin
Route::get('/admin', function () {
    return view('layout/admin');
})->name('admin');

Route::get('/list/venue', [VenueController::class, 'adminList'])->name('venue.list');
Route::get('/test', [VenueController::class, 'test'])->name('test');

// Route::get('/test', function () {
//     return view('admin/venue/create');
// })->name('test');


// Route::get('/list/venue/data', [VenueController::class, 'listVenue'])->name('venue.data');
// Route::get('/list/venue', [VenueController::class, 'viewListVenue'])->name('venue.list');
