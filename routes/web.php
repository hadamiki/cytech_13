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
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('index');


Route::get('/products.create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::post('/products.store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');

Route::get('/products.edit/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::put('/products.edit/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');

Route::get('/products.show/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('show');

Route::delete('/products.delete/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
