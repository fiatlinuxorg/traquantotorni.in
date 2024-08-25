<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/trips', [HomeController::class, 'store'])->name('trips.store');
    Route::delete('/trips/{trip}', [HomeController::class, 'destroy'])->name('trips.destroy');
});



require __DIR__ . '/auth.php';
