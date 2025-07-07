<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeberangkatanController;
use App\Http\Controllers\PenghasilanController;


Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard pakai controller
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group routes yang membutuhkan auth
Route::middleware(['auth'])->group(function () {
    Route::resource('mitra', MitraController::class);
    Route::resource('jamaah', JamaahController::class);
    Route::resource('keberangkatan', KeberangkatanController::class);
    Route::resource('penghasilan', PenghasilanController::class)->only(['index']);


    // Route profile sementara (placeholder)
    Route::get('/profile', function () {
        return 'Halaman Edit Profil (sementara)';
    })->name('profile.edit');
});

Route::get('/laporan/bulanan', [LaporanController::class, 'bulanan'])->name('laporan.bulanan');
Route::get('/laporan/tahunan', [LaporanController::class, 'tahunan'])->name('laporan.tahunan');
Route::get('/jamaah/print', [JamaahController::class, 'print'])->name('jamaah.print');
Route::get('/jamaah/{jamaah}/cetak', [\App\Http\Controllers\JamaahController::class, 'printSingle'])->name('jamaah.cetak');
Route::get('/mitra/{id}/print', [App\Http\Controllers\MitraController::class, 'print'])->name('mitra.print');




// Route logout cepat
Route::get('/force-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});

require __DIR__.'/auth.php';
