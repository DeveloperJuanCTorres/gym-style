<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
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
Route::get('/terminos',[HomeController::class,'terminos'])->name('terminos');
Route::get('/politicas',[HomeController::class,'politicas'])->name('politicas');
Route::get('/pedidos',[HomeController::class,'pedidos'])->name('pedidos');

Route::get('/libro-de-reclamaciones', [HomeController::class, 'libroReclamaciones'])
    ->name('libro-reclamaciones');

Route::post('/reclamo',[App\Http\Controllers\HomeController::class,'correoReclamo']);

Route::get('/gracias/{order}', [CheckoutController::class, 'gracias'])
    ->name('checkout.gracias');

Route::post('/newsletter', [HomeController::class, 'subscribe'])
    ->name('newsletter.subscribe');

Route::get('/producto/{id}/detalle',[ShopController::class,'detalle']);


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');


Route::post('/solicitar-producto', [HomeController::class, 'solicitarProducto'])
    ->name('product-request.store');




Route::post('/cart/add', [CartController::class,'add'])
    ->name('cart.add');

Route::post('/cart/update', [CartController::class,'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{rowId}', [CartController::class,'remove'])
    ->name('cart.remove');

Route::get('/cart/content', [CartController::class,'content'])
    ->name('cart.content');

Route::delete('/cart/clear', [CartController::class,'destroy']);
    

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
