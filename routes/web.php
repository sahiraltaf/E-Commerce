<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\controllers\ProductController;
use App\Http\controllers\Auth\RegisterController;
use App\Http\controllers\Auth\loginController;

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


/* Register Routes */ 

Route::get('admin/register', [RegisterController::class, 'create'])->name('admin.register');
Route::post('admin/register', [RegisterController::class, 'store'])->name('admin.register');

/* Login Routes */ 

Route::get('admin/login', [loginController::class, 'create'])->name('login');
Route::post('admin/login', [loginController::class, 'login'])->name('login');
Route::get('logout', [loginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function(){
    Route::get('admin/dashboard', function () {
        return view('admin-panel.layouts.app');
    })->name('admin.dashboard');
    Route::get('users/list', [UserController::class, 'index'])->name('users.list');
    Route::get('products/list', [ProductController::class, 'index'])->name('products.list');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
});



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


