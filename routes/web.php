<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/hombre',[ShopController::class,'hombre'])->name('shop.hombre');

Route::get('/mujer',[ShopController::class,'mujer'])->name('shop.mujer');

// Route::get('/producto/{slug}',[ShopController::class,'producto'])->name('producto');

// Route::get('/checkout',[ShopController::class,'checkout'])->name('checkout');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
