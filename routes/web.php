<?php

use App\Http\Controllers\CategoryController;
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

// Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
// Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('category.delete');

Route::resource('categories', CategoryController::class);
