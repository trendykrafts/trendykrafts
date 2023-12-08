<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BillingController;

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

Route::get('/sprd', function () {
    return view('products.screate');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::get('/products/{id}/delete', [ProductController::class, 'confirmDelete']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers/create', [CustomerController::class, 'create']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit']);
    Route::put('/customers/{id}', [CustomerController::class, 'update']);
    Route::get('/customers/{id}/delete', [CustomerController::class, 'confirmDelete']);
    // Route::resource('customers', CustomerController::class);
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);

    // routes/web.php
    Route::get('/billings', [BillingController::class, 'index'])->name('billings.index');
    Route::get('/billings/create', [BillingController::class, 'create'])->name('billings.create');
    Route::post('/billings', [BillingController::class, 'store'])->name('billings.store');
    Route::get('/billings/{id}/edit', [BillingController::class, 'edit'])->name('billings.edit');
    Route::put('/billings/{id}', [BillingController::class, 'update'])->name('billings.update');
    Route::get('/billings/{id}/delete', [BillingController::class, 'confirmDelete']);
    Route::delete('/billings/{id}', [BillingController::class, 'destroy'])->name('billings.destroy');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/create', [ProductController::class, 'create']);
// Route::post('/products', [ProductController::class, 'store']);
// Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
// Route::put('/products/{id}', [ProductController::class, 'update']);
// Route::delete('/products/{id}', [ProductController::class, 'destroy']);
