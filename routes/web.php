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

Route::prefix('category')->group(function () {
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.list');
    Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/{id}/update', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/{id}/destroy', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
});
Route::prefix('product')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
    Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/{id}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/{id}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/{id}/destroy', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/', [\App\Http\Controllers\ProductController::class, 'search'])->name('product.search');
});
