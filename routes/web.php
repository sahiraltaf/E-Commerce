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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('admin/login', function () {
    return view('admin-panel.login');
})->name('admin.login');

Route::get('admin/register', function () {
    return view('admin-panel.register');
})->name('admin.register');


Route::get('admin/dashboard', function () {
    return view('admin-panel.layouts.app');
})->name('admin.dashboard');


Route::get('/shop', function () {
    return view('shop');
})->name('shop');


Route::get('/shop-detail', function () {
    return view('product-detail');
})->name('shop.detail');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/tastimonial', function () {
    return view('tastimonial');
})->name('tastimonial');


