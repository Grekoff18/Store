<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/{category_name}', [ProductController::class, 'showCategory'])->name("showCategory");
Route::get('/{category_name}/{product_alias}', [ProductController::class, 'show'])->name("showProduct");
Route::get('/cart', [CartController::class, 'index'])->name("cart");


