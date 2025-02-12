<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemController;

// Make the landing page the categories page or redirect as desired:
Route::get('/', function () {
    return redirect()->route('categories.index');
});

// Protected Routes (Require Authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes for Categories and Suppliers (accessible by all authenticated users)
    Route::resource('categories', CategoryController::class);
    Route::resource('suppliers', SupplierController::class);

    // Routes for Items and Inventory (accessible by all authenticated users)
    Route::resource('items', ItemController::class);
    Route::resource('inventory', InventoryController::class);

    // Profile Management Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes (Laravel Breeze/Fortify)
require __DIR__.'/auth.php';
