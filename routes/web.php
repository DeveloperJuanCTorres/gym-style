<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/accesorios',[ShopController::class,'accesorios'])->name('shop.accesorios');

Route::get('/producto/{id}/detalle',[ShopController::class,'detalle']);



Route::post('/cart/add', [CartController::class,'add'])
    ->name('cart.add');

Route::post('/cart/update', [CartController::class,'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{rowId}', [CartController::class,'remove'])
    ->name('cart.remove');

Route::get('/cart/content', [CartController::class,'content'])
    ->name('cart.content');
    

Route::get('/clear-cache-temp', function () {

Artisan::call('optimize:clear');

Artisan::call('config:clear');

Artisan::call('cache:clear');

Artisan::call('route:clear');

Artisan::call('view:clear');

return nl2br(Artisan::output()) . '<br><br>CACHE LIMPIADA';

});
// Route::get('/producto/{slug}',[ShopController::class,'producto'])->name('producto');

// Route::get('/checkout',[ShopController::class,'checkout'])->name('checkout');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
