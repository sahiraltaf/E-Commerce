<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\controllers\ProductController;
use App\Http\controllers\Auth\RegisterController;
use App\Http\controllers\Auth\loginController;
use App\Http\controllers\CategoryController;
use App\Http\controllers\HomeController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('shop', [HomeController::class, 'shop'])->name('shop');


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

    // Two Factor authentication  

    // Route::get('2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');

    // Route::post('2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');

    // Route::get('2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');

    
    // Route::prefix('products')->group(function(){
        Route::get('products/list', [ProductController::class, 'index'])->name('products.list');
        Route::get('product/create', [ProductController::class, 'create'])->name('product.create');   
        Route::get('get-subcategories', [CategoryController::class, 'getSubCategories'])->name('get-subcategories');
        Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('add/cart', [ProductController::class, 'addCart'])->name('add.cart');
        Route::get('cart', [ProductController::class, 'cart'])->name('cart');
        Route::get('update-cart', [ProductController::class, 'updateCart'])->name('update.cart');
        Route::get('remove-cart', [ProductController::class, 'removeCart'])->name('remove-cart');
        Route::get('total-payout', [ProductController::class, 'totalPayout'])->name('total-payout');

        Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');    


        

        
        
        
        // });    
        Route::get('users/list', [UserController::class, 'index'])->name('users.list');
   
});

Route::get('/shop-detail', function () {
    return view('product-detail');
})->name('shop.detail');





Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/tastimonial', function () {
    return view('tastimonial');
})->name('tastimonial');


