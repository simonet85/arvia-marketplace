<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Frontend routes
Route::controller(FrontEndController::class)->group(function () {
  Route::get('/', 'home')->name('home');
  // Route::get('/products', 'index')->name('products');
  Route::get('/products', 'products')->name('products.index');
  Route::get('/about', 'about')->name('about');
  Route::get('/categories', 'categories')->name('categories');
  Route::get('/products/fetch', 'fetch')->name('products.fetch');
  Route::get('/products/search', 'fetch')->name('products.search');
});
// Product routes
Route::controller(ProductController::class)->group(function () {
  Route::post('/admin/products','store')->name('products.store');
  Route::put('/admin/products/{product}','update')->name('products.update');
  Route::get('/products/create','create')->name('products.create');
  Route::get('/products/edit/{product}','edit')->name('products.edit');
  Route::delete('/admin/products/{product}','destroy')->name('products.destroy');
  Route::get('/products/{product}','show')->name('products.show');

  Route::get('/admin/products','index')->name('admin.products.index');
  Route::get('/admin/products/json', 'json')->name('admin.products.json');

});
// Category routes
Route::controller(CategoryController::class)->group(function () {
  Route::get('/categories','index')->name('categories.index');
  Route::post('/categories','store')->name('categories.store');
  Route::put('/categories/{category}','update')->name('categories.update');
  Route::delete('/categories/{category}','destroy')->name('categories.destroy');
  Route::get('/admin/categories','index')->name('admin.categories.index');
  Route::get('/categories/{slug}','show')->name('categories.show');
  Route::get('/admin/categories/json', 'json')->name('admin.categories.json');
});
// Cart routes
Route::controller(CartController::class)->group(function () {
  Route::get('/cart', 'index')->name('cart.index');
  Route::post('/cart', 'store')->name('cart.store');
  Route::delete('/cart/{product}', 'destroy')->name('cart.destroy');
});

Route::controller(CheckoutController::class)->group(function () {
  Route::get('/checkout', 'index')->name('checkout.index');
  Route::post('/checkout', 'store')->name('checkout.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
  Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

// Route::middleware(['auth', 'verified'])->group(function () {
//   Route::get('/dashboard', function () {
//     return view('dashboard');
//   })->name('dashboard');
// });

require __DIR__.'/auth.php'; 
