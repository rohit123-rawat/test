<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('category', CategoryController::class);
    Route::post('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::resource('brand', BrandController::class);
    Route::post('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');



    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post ('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

});

require __DIR__.'/auth.php';
