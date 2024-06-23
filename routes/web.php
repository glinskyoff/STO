<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sto', [OrderController::class, 'create'])->name('sto');
Route::get('/admin', [OrderController::class, 'admin'])->name('admin');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/carmodels/{id}', [OrderController::class, 'getCarModels'])->name('orders.carmodels');
