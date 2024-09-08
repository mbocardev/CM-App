<?php

use App\Modules\OrderSupplier\Controllers\OrderSupplierController;
use Illuminate\Support\Facades\Route;

// Routes pour les commandes des fournisseurs
Route::get('order_suppliers', [OrderSupplierController::class, 'index'])->name('order_suppliers.index');
Route::get('order_suppliers/create', [OrderSupplierController::class, 'create'])->name('order_suppliers.create');
Route::post('order_suppliers', [OrderSupplierController::class, 'store'])->name('order_suppliers.store');
Route::get('order_suppliers/{id}', [OrderSupplierController::class, 'show'])->name('order_suppliers.show');
Route::get('order_suppliers/{id}/edit', [OrderSupplierController::class, 'edit'])->name('order_suppliers.edit');
Route::put('order_suppliers/{id}', [OrderSupplierController::class, 'update'])->name('order_suppliers.update');
Route::delete('order_suppliers/{id}', [OrderSupplierController::class, 'destroy'])->name('order_suppliers.destroy');