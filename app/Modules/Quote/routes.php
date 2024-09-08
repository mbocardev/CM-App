<?php

use App\Modules\Quote\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// Routes pour les devis
Route::get('quotes', [QuoteController::class, 'index'])->name('quotes.index');
Route::get('quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
Route::post('quotes', [QuoteController::class, 'store'])->name('quotes.store');
Route::get('quotes/{id}', [QuoteController::class, 'show'])->name('quotes.show');
Route::get('quotes/{id}/edit', [QuoteController::class, 'edit'])->name('quotes.edit');
Route::put('quotes/{id}', [QuoteController::class, 'update'])->name('quotes.update');
Route::delete('quotes/{id}', [QuoteController::class, 'destroy'])->name('quotes.destroy');