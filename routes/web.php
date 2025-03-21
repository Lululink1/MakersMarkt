<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

// ✅ Homepagina → toont producten via ProductController@index
Route::get('/', [ProductController::class, 'index'])->name('home');

// ✅ Dashboard (alleen ingelogd + geverifieerd)
Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Profielbeheer (auth + verified)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Shop pagina (optioneel losse view)
Route::get('/shop', fn() => view('shop'))->name('shop');

// ✅ Winkelwagen routes
Route::get('/cart', [CheckoutController::class, 'cart'])->name('cart');
Route::post('/cart/add/{id}', [CheckoutController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update/{id}', [CheckoutController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CheckoutController::class, 'removeCartItem'])->name('cart.remove');

// ✅ Checkout routes
Route::get('/checkout', [CheckoutController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::post('/order/process', [OrderController::class, 'process'])->middleware('auth')->name('order.process');

// ✅ Bestelling succesvol afgerond
Route::get('/order/success', fn() => view('order-success'))->middleware('auth')->name('order.success');

// ✅ Bestellingen bekijken (order tracking)
Route::get('/my-orders', [OrderController::class, 'myOrders'])->middleware('auth')->name('orders.track');

// ✅ Producten overzicht en detail
Route::get('/producten', [ProductController::class, 'browse'])->name('producten.index');
Route::get('/producten/{productId}', [ProductController::class, 'show'])->name('producten.show');

// ✅ Auth routes
require __DIR__.'/auth.php';
