<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\DriverController;
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
    Route::get('/mobil', [VehicleController::class, 'index'])->name('mobil.index');
    Route::get('/mobil/create', [VehicleController::class, 'create'])->name('mobil.create');
    Route::post('/mobil', [VehicleController::class, 'store'])->name('mobil.store');
    Route::get('/mobil/{vehicle}', [VehicleController::class, 'show'])->name('mobil.show');
    Route::get('/mobil/{vehicle}/edit', [VehicleController::class, 'edit'])->name('mobil.edit');
    Route::put('/mobil/{vehicle}', [VehicleController::class, 'update'])->name('mobil.update');
    Route::delete('/mobil/{vehicle}', [VehicleController::class, 'destroy'])->name('mobil.destroy');

    // Manajemen Pengemudi
    Route::get('/pengemudi', [DriverController::class, 'index'])->name('pengemudi.index');
    Route::get('/pengemudi/create', [DriverController::class, 'create'])->name('pengemudi.create');
    Route::post('/pengemudi', [DriverController::class, 'store'])->name('pengemudi.store');
    Route::get('/pengemudi/{driver}', [DriverController::class, 'show'])->name('pengemudi.show');
    Route::get('/pengemudi/{driver}/edit', [DriverController::class, 'edit'])->name('pengemudi.edit');
    Route::put('/pengemudi/{driver}', [DriverController::class, 'update'])->name('pengemudi.update');
    Route::delete('/pengemudi/{driver}', [DriverController::class, 'destroy'])->name('pengemudi.destroy');


    // Manajemen Komponen
    Route::get('/komponen', [ComponentController::class, 'index'])->name('komponen.index');
    Route::get('/komponen/create', [ComponentController::class, 'create'])->name('komponen.create');
    Route::post('/komponen', [ComponentController::class, 'store'])->name('komponen.store');
    Route::get('/komponen/{driver}', [ComponentController::class, 'show'])->name('komponen.show');
    Route::get('/komponen/{driver}/edit', [ComponentController::class, 'edit'])->name('komponen.edit');
    Route::put('/komponen/{driver}', [ComponentController::class, 'update'])->name('komponen.update');
    Route::delete('/komponen/{driver}', [ComponentController::class, 'destroy'])->name('komponen.destroy');

});

require __DIR__.'/auth.php';
