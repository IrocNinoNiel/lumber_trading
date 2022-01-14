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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile.index');

Route::get('/user/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::get('/user/addcart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.addcart');
Route::post('/user/addcart/{id}',[App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::post('/user/checkout',[App\Http\Controllers\CartController::class, 'toCheckout'])->name('cart.tocheckout');
Route::get('/user/checkout',[App\Http\Controllers\CartController::class, 'checkOutUI'])->name('cart.tocheckoutui');
Route::delete('/user/cart/delete/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/user/purchase', [App\Http\Controllers\PurchaseController::class, 'index'])->name('purchase.index');
Route::post('/user/purchase', [App\Http\Controllers\PurchaseController::class, 'store'])->name('purchase.store');