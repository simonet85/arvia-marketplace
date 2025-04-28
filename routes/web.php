<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontEndController;

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

Route::controller(FrontEndController::class)->group(function () {
  Route::get('/', 'home')->name('home');
  // Route::get('/products', 'index')->name('products');
  Route::get('/products', 'products')->name('products.index');
  Route::get('/about', 'about')->name('about');
  Route::get('/categories', 'categories')->name('categories');
  Route::get('/products/fetch', 'fetch')->name('products.fetch');
  Route::get('/products/search', 'fetch')->name('products.search');
});

Route::controller(ProductController::class)->group(function () {
  Route::post('/products','store')->name('products.store');
  Route::put('/products/{product}','update')->name('products.update');
  Route::delete('/products/{product}','destroy')->name('products.destroy');
  Route::get('/products/{product}','show')->name('products.show');
  
});

Route::controller(CartController::class)->group(function () {
  Route::get('/cart', 'index')->name('cart.index');
  Route::post('/cart', 'store')->name('cart.store');
  Route::delete('/cart/{product}', 'destroy')->name('cart.destroy');
});

Route::controller(CheckoutController::class)->group(function () {
  Route::get('/checkout', 'index')->name('checkout.index');
  Route::post('/checkout', 'store')->name('checkout.store');
});

