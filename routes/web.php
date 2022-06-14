<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HellowWorldController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\WelcomeController;
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

//Route::get('/', function () { return view('welcome'); });

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth', 'can:isAdmin');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth', 'can:isAdmin');
Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth', 'can:isAdmin');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth', 'can:isAdmin');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth', 'can:isAdmin');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth', 'can:isAdmin');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth', 'can:isAdmin');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('auth', 'can:isAdmin');


Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth', 'can:isAdmin');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth', 'can:isAdmin');


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store')->middleware('auth');

Route::get('/hello', [HellowWorldController::class, 'show']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

Auth::routes();


//Route::get('/home', [HomeController::class, 'index'])->name('home');
