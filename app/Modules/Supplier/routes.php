<?php

use App\Modules\Supplier\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Routes pour les fournisseurs
Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('suppliers/{id}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::get('suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

