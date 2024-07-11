<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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


// Access for admin only
Route::middleware(['auth', 'checkUserRoleAdmin'])->group(function () {
    
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    // Route::get('/products/{product}/delete', [ProductController::class, 'confirm_delete'])->name('products.confirm_delete');
    // Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::get('/admin/carts/{cart}', [CartController::class, 'adminshow'])->name('carts.adminshow');
    Route::get('/admin/orders', [OrderController::class, 'adminindex'])->name('orders.adminindex');
    Route::get('/admin/orders/{order}', [OrderController::class, 'adminshow'])->name('orders.adminshow');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    // Route::get('/users/{user}/delete', [UserController::class, 'confirm_delete'])->name('users.confirm_delete');
    // Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});


// Access for logged in user and above (admin)
Route::middleware(['auth'])->group(function () {

    Route::get('/users/user/{user}/edit', [UserController::class, 'edit_profile'])->name('users.user.edit_profile');
    Route::put('/users/user/{user}', [UserController::class, 'update_profile'])->name('users.user.update_profile');
    Route::get('/users/user/{user}', [UserController::class, 'show_profile'])->name('users.user.show_profile');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{order}', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

});


// Public access
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/registerstore', [UserController::class, 'registerstore'])->name('registerstore');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
    // Alternative writing to keep Registration, Login and Logout together
    // Route::post('/logout', [UserController::class, 'logout'])->name('logout') placed in Route::middleware(['auth']) group would be the same

Route::get('/', [ProductController::class, 'main'])->name('products.main');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');  //Keep at bottom of all Product routes

Route::post('/carts/add/{product}', [CartController::class, 'add'])->name('carts.add');
Route::get('/carts/{cart}', [CartController::class, 'show'])->name('carts.show');
Route::put('/cartDetails/{cartDetail}', [CartController::class, 'updateCartDetail'])->name('carts.updateCartDetail');

