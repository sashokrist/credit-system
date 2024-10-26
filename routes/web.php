<?php

use App\Http\Controllers\CreditController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [CreditController::class, 'index'])->name('credits.index');

Route::middleware(['auth'])->group(function () {
    // Routes for Credit
    Route::get('/credits/create', [CreditController::class, 'create'])->name('credits.create');
    Route::post('/credits', [CreditController::class, 'store'])->name('credits.store');

    // Routes for Payment
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
});
