<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruDashboardController;
use App\Http\Controllers\KepsekDashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| AUTH & REDIRECT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login.form');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| GURU ROUTES
|--------------------------------------------------------------------------
| Akses khusus role: Guru
*/
Route::middleware(['auth', 'role:Guru'])->group(function () {

    // Dashboard Guru
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])
        ->name('dashboard');

    // Profile Guru
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.show');

    // Siswa
    Route::resource('siswa', SiswaController::class);

    // Absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])
        ->name('absensi.index');

    Route::post('/absensi', [AbsensiController::class, 'store'])
        ->name('absensi.store');

    // Jurnal Guru
    Route::get('/jurnal', [JurnalController::class, 'index'])
        ->name('jurnal.index');

    Route::get('/jurnal/create', [JurnalController::class, 'create'])
        ->name('jurnal.create');

    Route::post('/jurnal', [JurnalController::class, 'store'])
        ->name('jurnal.store');

    Route::get('/jurnal/{id}/edit', [JurnalController::class, 'edit'])
        ->name('jurnal.edit');

    Route::put('/jurnal/{id}', [JurnalController::class, 'update'])
        ->name('jurnal.update');

    Route::delete('/jurnal/{id}', [JurnalController::class, 'destroy'])
        ->name('jurnal.destroy');
});


/*
|--------------------------------------------------------------------------
| KEPALA SEKOLAH ROUTES
|--------------------------------------------------------------------------
| Akses khusus role: Kepala Sekolah
*/
Route::middleware(['auth', 'role:Kepala Sekolah'])->group(function () {

    Route::get('/kepsek/dashboard', [KepsekDashboardController::class, 'index'])
        ->name('kepsek.dashboard');

    Route::get('/kepsek/profile', function () {
        return view('kepsek.profile');
    })->name('kepsek.profile');

    Route::get('/kepsek/jurnal/{id}', [JurnalController::class, 'showKepsek'])
        ->name('kepsek.jurnal.show');

    // ================= REKAP =================
    Route::get('/rekap', [RekapController::class, 'index'])
        ->name('rekap.index');

    Route::get('/rekap/download/excel', [RekapController::class, 'download'])
    ->name('rekap.download.excel');

    Route::get('/rekap/download-pdf', [RekapController::class, 'downloadPdf'])
        ->name('rekap.download.pdf');
});
