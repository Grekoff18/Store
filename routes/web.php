<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
// Home route
Route::get('/', [HomeController::class, 'index'])->name("home");
// Cart route
Route::get('/cart', [CartController::class, 'index'])->name("cart");
Route::post('/add-to-cart', [CartController::class, 'addToCard'])->name("addToCard");
// Product route
Route::get('/{category_name}/{product_id}', [ProductController::class, 'show'])->name("showProduct");
Route::get('/{category_name}', [ProductController::class, 'showCategory'])->name("showCategory");





