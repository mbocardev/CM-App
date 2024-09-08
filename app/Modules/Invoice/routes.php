<?php

use App\Modules\Invoice\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

// Routes pour les factures
Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('invoices', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
Route::get('invoices/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('invoices/{id}', [InvoiceController::class, 'update'])->name('invoices.update');
Route::delete('invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');