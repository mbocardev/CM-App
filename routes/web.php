<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Modules\Users\Controllers\UserController;
use App\Modules\Customer\Controllers\CustomerController;
use App\Modules\Supplier\Controllers\SupplierController;

// Routes pour les utilisateurs (administrateurs)
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Routes pour gérer les clients
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customers/create', [UserController::class, 'createCustomer'])->name('customers.create');
Route::post('customers', [UserController::class, 'storeCustomer'])->name('customers.store');
Route::get('customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// Routes pour gérer les fournisseurs
Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('suppliers/create', [UserController::class, 'createSupplier'])->name('suppliers.create');
Route::post('suppliers', [UserController::class, 'storeSupplier'])->name('suppliers.store');
Route::get('suppliers/{id}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::get('suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy'); 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require base_path('modules/Product/routes.php');
require base_path('modules/Transactions/routes.php');

require __DIR__.'/auth.php';
