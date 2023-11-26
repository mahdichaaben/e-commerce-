<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/product/{product:slug}', [ProductController::class,'index'])->name('product.index');
Route::get('/panier', function () {
    return view('home.panier.panier');
});

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
