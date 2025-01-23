<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalTransactionController;
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
    Route::get('/komponen/{component}', [ComponentController::class, 'show'])->name('komponen.show');
    Route::get('/komponen/{component}/edit', [ComponentController::class, 'edit'])->name('komponen.edit');
    Route::put('/komponen/{component}', [ComponentController::class, 'update'])->name('komponen.update');
    Route::delete('/komponen/{component}', [ComponentController::class, 'destroy'])->name('komponen.destroy');


    // Manajemen Pelanggan
    Route::get('/pelanggan', [CustomerController::class, 'index'])->name('pelanggan.index');
    Route::get('/pelanggan/create', [CustomerController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan', [CustomerController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/{customer}', [CustomerController::class, 'show'])->name('pelanggan.show');
    Route::get('/pelanggan/{customer}/edit', [CustomerController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/{customer}', [CustomerController::class, 'update'])->name('pelanggan.update');
    Route::delete('/pelanggan/{customer}', [CustomerController::class, 'destroy'])->name('pelanggan.destroy');


    // Manajemen Mobil Keluar
    Route::get('/mobil-keluar', [RentalTransactionController::class, 'index'])->name('mobil.keluar.index');
    Route::get('/mobil-keluar/create', [RentalTransactionController::class, 'create'])->name('mobil.keluar.create');
    Route::post('/mobil-keluar', [RentalTransactionController::class, 'store'])->name('mobil.keluar.store');
    Route::get('/mobil-keluar/{transaction}', [RentalTransactionController::class, 'show'])->name('mobil.keluar.show');
    Route::get('/mobil-keluar/{transaction}/edit', [RentalTransactionController::class, 'edit'])->name('mobil.keluar.edit');
    Route::put('/mobil-keluar/{transaction}', [RentalTransactionController::class, 'update'])->name('mobil.keluar.update');
    Route::delete('/mobil-keluar/{transaction}', [RentalTransactionController::class, 'destroy'])->name('mobil.keluar.destroy');

});

require __DIR__.'/auth.php';
