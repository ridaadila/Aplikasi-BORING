<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\DekorasiController;
use App\Http\Controllers\FotograferController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\ProdukCateringController;
use App\Http\Controllers\ProdukDekorasiController;
use App\Http\Controllers\ProdukFotograferController;
use App\Http\Controllers\ProdukVenueController;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/detail/{id}', [BerandaController::class, 'detail']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/venue', [VenueController::class, 'index']);
Route::get('/decoration', [DekorasiController::class, 'index']);
Route::get('/photography', [FotograferController::class, 'index']);
Route::get('/catering', [CateringController::class, 'index']);

/*
start kana
*/
Route::get('/dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');
/*
end kana
*/
// ini punya yang awal
// Route::get('/login', function () {
//     return view('boring/login-register');
// })->name('login');

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
Route::get('/list/venue/product', [ProdukVenueController::class, 'adminList']);
Route::get('/list/venue/create', [VenueController::class, 'showCreate']);
Route::post('/list/venue/insert', [VenueController::class, 'insert']);
Route::post('/list/venue/update', [VenueController::class, 'update']);
Route::get('/list/venue/edit/{id}', [VenueController::class, 'showUpdate']);
Route::get('/list/venue/delete/{id}', [VenueController::class, 'delete']);
Route::get('/list/venue/product/create', [ProdukVenueController::class, 'showCreate']);
Route::post('/list/venue/product/insert', [ProdukVenueController::class, 'insert']);
Route::post('/list/venue/product/update', [ProdukVenueController::class, 'update']);
Route::get('/list/venue/product/edit/{id}', [ProdukVenueController::class, 'showUpdate']);
Route::get('/list/venue/product/delete/{id}', [ProdukVenueController::class, 'delete']);

Route::get('/list/decoration', [DekorasiController::class, 'adminList']);
Route::get('/list/decoration/product', [ProdukDekorasiController::class, 'adminList']);
Route::get('/list/decoration/create', [DekorasiController::class, 'showCreate']);
Route::post('/list/decoration/insert', [DekorasiController::class, 'insert']);
Route::post('/list/decoration/update', [DekorasiController::class, 'update']);
Route::get('/list/decoration/edit/{id}', [DekorasiController::class, 'showUpdate']);
Route::get('/list/decoration/delete/{id}', [DekorasiController::class, 'delete']);
Route::get('/list/decoration/product/create', [ProdukDekorasiController::class, 'showCreate']);
Route::post('/list/decoration/product/insert', [ProdukDekorasiController::class, 'insert']);
Route::post('/list/decoration/product/update', [ProdukDekorasiController::class, 'update']);
Route::get('/list/decoration/product/edit/{id}', [ProdukDekorasiController::class, 'showUpdate']);
Route::get('/list/decoration/product/delete/{id}', [ProdukDekorasiController::class, 'delete']);

Route::get('/list/catering', [CateringController::class, 'adminList']);
Route::get('/list/catering/product', [ProdukCateringController::class, 'adminList']);
Route::get('/list/catering/create', [CateringController::class, 'showCreate']);
Route::post('/list/catering/insert', [CateringController::class, 'insert']);
Route::post('/list/catering/update', [CateringController::class, 'update']);
Route::get('/list/catering/edit/{id}', [CateringController::class, 'showUpdate']);
Route::get('/list/catering/delete/{id}', [CateringController::class, 'delete']);
Route::get('/list/catering/product/create', [ProdukCateringController::class, 'showCreate']);
Route::post('/list/catering/product/insert', [ProdukCateringController::class, 'insert']);
Route::post('/list/catering/product/update', [ProdukCateringController::class, 'update']);
Route::get('/list/catering/product/edit/{id}', [ProdukCateringController::class, 'showUpdate']);
Route::get('/list/catering/product/delete/{id}', [ProdukCateringController::class, 'delete']);

Route::get('/list/photography', [FotograferController::class, 'adminList']);
Route::get('/list/photography/product', [ProdukFotograferController::class, 'adminList']);
Route::get('/list/photography/create', [FotograferController::class, 'showCreate']);
Route::post('/list/photography/insert', [FotograferController::class, 'insert']);
Route::post('/list/photography/update', [FotograferController::class, 'update']);
Route::get('/list/photography/edit/{id}', [FotograferController::class, 'showUpdate']);
Route::get('/list/photography/delete/{id}', [FotograferController::class, 'delete']);
Route::get('/list/photography/product/create', [ProdukFotograferController::class, 'showCreate']);
Route::post('/list/photography/product/insert', [ProdukFotograferController::class, 'insert']);
Route::post('/list/photography/product/update', [ProdukFotograferController::class, 'update']);
Route::get('/list/photography/product/edit/{id}', [ProdukFotograferController::class, 'showUpdate']);
Route::get('/list/photography/product/delete/{id}', [ProdukFotograferController::class, 'delete']);

Route::get('/test', [VenueController::class, 'test'])->name('test');

// Route::get('/test', function () {
//     return view('admin/venue/create');
// })->name('test');


// Route::get('/list/venue/data', [VenueController::class, 'listVenue'])->name('venue.data');
// Route::get('/list/venue', [VenueController::class, 'viewListVenue'])->name('venue.list');
