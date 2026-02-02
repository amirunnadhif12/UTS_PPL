<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/products', fn() => view('products'))->name('products');
Route::get('/contact', fn() => view('contact'))->name('contact');