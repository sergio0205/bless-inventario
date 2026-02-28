<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;

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


Route::resource('products', ProductController::class);
Route::resource('clients', ClientController::class);
Route::resource('orders', OrderController::class);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/reports/sales', [ReportController::class, 'sales']);
Route::get('/orders/create', [OrderController::class, 'create']);
Route::get('/reports/sales/view', [ReportController::class, 'salesView']);