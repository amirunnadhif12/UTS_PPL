<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/articles/{slug}', fn($slug) => view('articles.show', ['slug' => $slug]))->where('slug', '[a-zA-Z0-9\-]+')->name('articles.show');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes (guest only)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        
        Route::get('/products', [ProductController::class, 'adminIndex'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::post('/products/bulk-delete', [ProductController::class, 'bulkDestroy'])->name('products.bulkDestroy');
        Route::delete('/products/{id}/image/{imageField}', [ProductController::class, 'deleteImage'])->name('products.deleteImage');
    });
});