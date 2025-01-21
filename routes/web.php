<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $admin = Auth::user();
    return view('Dashboard.index', compact('admin'));    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manajemen Mobil
    // Route::resource('mobil', VehicleController::class);
    Route::get('/mobil', [VehicleController::class, 'index'])->name('mobil.index');
    Route::get('/mobil/create', [VehicleController::class, 'create'])->name('mobil.create');
    Route::post('/mobil', [VehicleController::class, 'store'])->name('mobil.store');
    Route::get('/mobil/{vehicle}', [VehicleController::class, 'show'])->name('mobil.show');
    Route::get('/mobil/{vehicle}/edit', [VehicleController::class, 'edit'])->name('mobil.edit');
    Route::put('/mobil/{vehicle}', [VehicleController::class, 'update'])->name('mobil.update');
    Route::delete('/mobil/{vehicle}', [VehicleController::class, 'destroy'])->name('mobil.destroy');

});

require __DIR__.'/auth.php';
