<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('matakuliah', MataKuliahController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::get('/admin-krs', [KrsController::class, 'adminIndex'])->name('admin.krs');
});

// Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/jadwal-mahasiswa', [JadwalController::class, 'jadwalMahasiswa'])->name('jadwal.mahasiswa');

    Route::get('/krs/export', [KrsController::class, 'export'])->name('krs.export'); // ← harus sebelum /krs/{id}
    Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
    Route::post('/krs', [KrsController::class, 'store'])->name('krs.store');
    Route::delete('/krs/{id}', [KrsController::class, 'destroy'])->name('krs.destroy');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
