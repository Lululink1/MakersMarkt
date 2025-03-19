<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Homepagina
Route::get('/', fn() => view('welcome'));

// Dashboard (alleen ingelogd + geverifieerd)
Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// Profielbeheer (auth + verified)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Shop pagina
Route::get('/shop', function () {
    return view('shop');
})->name('shop');

// Winkelwagen & Checkout
Route::get('/cart', [CheckoutController::class, 'cart'])->name('cart');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->middleware('auth')->name('checkout');

// Order verwerken
Route::post('/order/process', [OrderController::class, 'process'])->middleware('auth')->name('order.process');

// Bestelling succesvol afgerond
Route::get('/order/success', function () {
    return view('order-success');
})->middleware('auth')->name('order.success');

// Bestellingen bekijken (order tracking)
Route::get('/my-orders', [OrderController::class, 'myOrders'])->middleware('auth')->name('orders.track');

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
