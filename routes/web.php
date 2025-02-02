<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesCommissionController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/commission', [SalesCommissionController::class, 'calculateCommission']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);