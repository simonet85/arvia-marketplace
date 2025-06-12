<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\SkinTypeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\IngredientController;

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
  Route::get('/cart', 'cart')->name('cart');

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
  Route::get('/admin/categories','index')->name('categories.index');
  Route::get('/admin/categories/create','create')->name('categories.create');
  Route::post('/admin/categories','store')->name('categories.store');
  Route::match(['put', 'patch'], '/admin/categories/{category}','update')->name('categories.update');

  Route::delete('/admin/categories/{category}','destroy')->name('categories.destroy');
  Route::get('/categories/{slug}','show')->name('categories.show');
  Route::get('/admin/categories/json', 'json')->name('admin.categories.json');
});

// Ingredient routes
Route::controller(IngredientController::class)->group(function () {
  Route::get('/admin/ingredients', 'index')->name('ingredients.index');
  Route::get('/admin/ingredients/create', 'create')->name('ingredients.create');
  Route::post('/admin/ingredients', 'store')->name('ingredients.store');
  Route::put('/admin/ingredients/{ingredient}', 'update')->name('ingredients.update');
  Route::delete('/admin/ingredients/{ingredient}', 'destroy')->name('ingredients.destroy');
  Route::get('/admin/ingredients/json', 'json')->name('admin.ingredients.json');
});

//SkinType routes
Route::controller(SkinTypeController::class)->group(function () {
  Route::get('/admin/skintypes', 'index')->name('skintypes.index');
  Route::get('/admin/skintypes/create', 'create')->name('skintypes.create');
  Route::post('/admin/skintypes', 'store')->name('skintypes.store');
  Route::put('/admin/skintypes/{skintype}', 'update')->name('skintypes.update');
  Route::delete('/admin/skintypes/{skintype}', 'destroy')->name('skintypes.destroy');
  Route::get('/admin/skintypes/json', 'json')->name('admin.skintypes.json');
});

//Order routes
Route::middleware('auth')->group(function () {
  Route::controller(OrderController::class)->group(function () {
    Route::get('/admin/orders','index')->name('orders.index');
    Route::get('/admin/orders/create','create')->name('orders.create');
    Route::get('/admin/orders/{order}','show')->name('orders.show');
    Route::get('/admin/orders/{order}/edit','edit')->name('orders.edit');
    Route::put('/admin/orders/{order}','update')->name('orders.update');
    Route::delete('/admin/orders/{order}','destroy')->name('orders.destroy');
    Route::post('/orders/{order}/cancel', 'cancel')->name('orders.cancel');
    Route::get('/admin/suivi-commandes', 'suivi')->name('suivi.index');
  });
});

// Cart routes
Route::middleware('auth')->group(function () {
    Route::controller(CartController::class)->group(function () {
    Route::get('/cart/items', 'index')->name('cart.index');
    Route::post('/cart', 'store')->name('cart.store');
    Route::delete('/cart/remove/{item}', 'remove')->name('cart.remove');
    Route::post('/cart/clear', 'clear')->name('cart.clear');
    Route::post('/cart/checkout', 'checkout')->name('cart.checkout');
    Route::put('/cart/update/{item}', 'update')->name('cart.update');
  });
});

// Wishlist routes
Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
});

Route::controller(CheckoutController::class)->group(function () {
  Route::get('/checkout', 'index')->name('checkout.index');
  Route::post('/checkout', 'store')->name('checkout.store');
});

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php'; 
