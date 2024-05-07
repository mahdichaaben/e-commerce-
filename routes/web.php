<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommmentController;
use App\Http\Controllers\FiltersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Models\Comment; 
use App\Models\Product;
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
Route::get('/filter', [FiltersController::class, 'index'])->name('filterPage.index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/product/{product:slug}', [ProductController::class,'index'])->name('product.index');
Route::get('/cart', function () {
    return view('cart.cart');
})->name('cart.cart');
Route::get('/kill',[CartController::class,'deleteSessionCart']);
Route::post('/itemkill',[CartController::class,'destroyById']);
Route::post('/cart',[CartController::class,'addToCart'])->name('cart.add');
Route::get('/carts',[CartController::class,'show'])->name('cart.show');

Route::get('/dashboard/categories', function () {
    return view('admin.dashboardcategories');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/products', function () {
    return view('admin.dashboardproduct');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// web.php
Route::post('/comments',[ProductController::class,'storeComment'])->name('comments.store');
Route::delete('/comments/{comment}', [ProductController::class, 'destroyComment'])
    ->name('comments.destroy');

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{parentName}/{childName}/{subchildName}', [CategoryController::class, 'showSubchild'])->name('category.show.subchild');
Route::get('/category/{parentName}/{childName}', [CategoryController::class, 'showChild'])->name('category.show.child');

require __DIR__.'/auth.php';
