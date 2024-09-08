<?php

use App\Modules\Transaction\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Routes pour les produits
Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');