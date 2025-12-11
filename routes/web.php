<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    // Menampilkan Form Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    // Proses Submit Login
    Route::post('/login', [AuthController::class, 'processLogin']);
    
    // Menampilkan Form Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    // Proses Submit Register
    Route::post('/register', [AuthController::class, 'processRegister']);
});

Route::middleware('auth')->group(function () {
    
    // Rute Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard (Halaman pertama pas login)
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Toko
    Route::resource('tokos', TokoController::class);

    // CRUD Stok
    Route::resource('stoks', StokController::class);
});
