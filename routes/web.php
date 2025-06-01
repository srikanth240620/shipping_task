<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


require __DIR__ . '/auth.php';



use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutsController;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('dashboard');

    Route::get('/products/{id}', [ProductsController::class, 'index']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/save_cart', [CartController::class, 'store']);
    Route::post('/update_cart', [CartController::class, 'update']);
    Route::get('/checkouts', [CheckoutsController::class, 'index']);
    Route::post('/checkouts_store', [CheckoutsController::class, 'store']);
    Route::post('/checkouts_success', [CheckoutsController::class, 'store']);
    Route::get('/orders', function () {
        return view('orders');
    });
});
