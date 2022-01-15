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

Route::group(['middleware' => 'CheckRole:buyer'],function(){

    Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('profile.index');
    Route::post('/user/profile/editbasic/{id}', [App\Http\Controllers\UserController::class, 'editBasicInfo'])->name('profile.editbasicinfo');
    Route::post('/user/profile/editphoto/{id}', [App\Http\Controllers\UserController::class, 'imageUploadPost'])->name('profile.imageuploadpost');
    Route::post('/user/profile/changepassword/{id}', [App\Http\Controllers\UserController::class, 'changePassword'])->name('profile.changepassword');
    Route::delete('/user/profile/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('/user/addcart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.addcart');
    Route::post('/user/addcart/{id}',[App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
    Route::post('/user/checkout',[App\Http\Controllers\CartController::class, 'toCheckout'])->name('cart.tocheckout');
    Route::get('/user/checkout',[App\Http\Controllers\CartController::class, 'checkOutUI'])->name('cart.tocheckoutui');
    Route::delete('/user/cart/delete/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/user/purchase', [App\Http\Controllers\PurchaseController::class, 'index'])->name('purchase.index');
    Route::post('/user/purchase', [App\Http\Controllers\PurchaseController::class, 'store'])->name('purchase.store');


});

Route::group(['middleware' => 'CheckRole:admin'],function(){
    Route::get('/admin/order', [App\Http\Controllers\AdminController::class, 'order'])->name('admin.order');
    Route::get('/admin/processing', [App\Http\Controllers\AdminController::class, 'processing'])->name('admin.processing');
    Route::get('/admin/pickup', [App\Http\Controllers\AdminController::class, 'pickup'])->name('admin.pickup');
    Route::get('/admin/deliver', [App\Http\Controllers\AdminController::class, 'deliver'])->name('admin.deliver');
    Route::get('/admin/complete', [App\Http\Controllers\AdminController::class, 'complete'])->name('admin.complete');
    Route::post('/admin/order/reject/{id}', [App\Http\Controllers\AdminController::class, 'reject'])->name('admin.reject');
    Route::post('/admin/order/accept/{id}', [App\Http\Controllers\AdminController::class, 'accept'])->name('admin.accept');
    Route::post('/admin/order/processing/{id}', [App\Http\Controllers\AdminController::class, 'done_process'])->name('admin.done_process');
    Route::post('/admin/order/completed/{id}', [App\Http\Controllers\AdminController::class, 'completed'])->name('admin.completed');

    Route::post('/admin/product/add', [App\Http\Controllers\ProductController::class, 'addproduct'])->name('product.add');
    Route::delete('/admin/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/admin/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'editPage'])->name('product.editpage');
    Route::post('/admin/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

    Route::post('/admin/product/search', [App\Http\Controllers\ProductController::class, 'search'])->name('product.search');
});