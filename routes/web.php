<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/order', [\App\Http\Controllers\MenuController::class, 'index'])->name('order.index');
Route::post('/order', [\App\Http\Controllers\MenuController::class, 'store'])->name('order.store');
Route::get('/total', [App\Http\Controllers\CartController::class, 'index'])->name('total.index');
Route::Delete('total/carts/{id}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/admin', [AdminController::class, 'index']);
