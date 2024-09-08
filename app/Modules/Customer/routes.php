<?php

use App\Modules\Customer\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Routes pour les clients
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
