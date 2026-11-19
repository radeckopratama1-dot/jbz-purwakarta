<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// 1. Rute Halaman Publik & Pendaftaran Oprec
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::post('/oprec/daftar', [PublicController::class, 'storeApplicant'])->name('oprec.store');

// 2. Rute Dashboard Admin CMS (CRUD Banner, Pengurus, Program, Berita/Galeri, Oprec)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // CRUD Banner
    Route::post('/banners', [AdminController::class, 'storeBanner'])->name('banners.store');
    Route::put('/banners/{banner}', [AdminController::class, 'updateBanner'])->name('banners.update');
    Route::delete('/banners/{banner}', [AdminController::class, 'destroyBanner'])->name('banners.destroy');

    // CRUD Pengurus Kabinet
    Route::post('/members', [AdminController::class, 'storeMember'])->name('members.store');
    Route::put('/members/{boardMember}', [AdminController::class, 'updateMember'])->name('members.update');
    Route::delete('/members/{boardMember}', [AdminController::class, 'destroyMember'])->name('members.destroy');

    // CRUD Program Kerja
    Route::post('/programs', [AdminController::class, 'storeProgram'])->name('programs.store');
    Route::put('/programs/{program}', [AdminController::class, 'updateProgram'])->name('programs.update');
    Route::delete('/programs/{program}', [AdminController::class, 'destroyProgram'])->name('programs.destroy');

    // CRUD Berita & Galeri PDD
    Route::post('/posts', [AdminController::class, 'storePost'])->name('posts.store');
    Route::put('/posts/{post}', [AdminController::class, 'updatePost'])->name('posts.update');
    Route::delete('/posts/{post}', [AdminController::class, 'destroyPost'])->name('posts.destroy');

    // Verifikasi & Hapus Pendaftar Oprec
    Route::patch('/applicants/{applicant}/status', [AdminController::class, 'updateApplicantStatus'])->name('applicants.status');
    Route::delete('/applicants/{applicant}', [AdminController::class, 'destroyApplicant'])->name('applicants.destroy');
});