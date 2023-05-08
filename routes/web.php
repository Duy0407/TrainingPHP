<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
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

Route::resource('/', WelcomeController::class);
// Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::group(['prefix' => 'admin', 'name' => 'admin'], function(){
    Route::resource('product', ProductController::class);
    Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
});
