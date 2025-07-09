<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->group(function () {
        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::post('permissions/store-multiple', [App\Http\Controllers\PermissionController::class, 'storeMultiple'])->name('permissions.storeMultiple'); // <-- ROUTE BARU
        Route::resource('permissions', App\Http\Controllers\PermissionController::class)->except('show');
    });



    // --- CONTOH PROTEKSI ROUTE ---

    // Hanya bisa diakses oleh user dengan role 'admin'
    Route::get('/admin/users', function() {
        return '<h1>Halaman Kelola User (Hanya Admin)</h1>';
    })->middleware('role:admin')->name('admin.users');

    // Hanya bisa diakses oleh user dengan izin 'publish articles'
    // Role 'admin' bisa, tapi 'writer' tidak bisa
    Route::get('/admin/publish', function() {
        return '<h1>Halaman Publikasi Artikel (Hanya Publisher)</h1>';
    })->middleware('permission:publish articles')->name('admin.publish');

    // Bisa diakses oleh role 'admin' ATAU 'writer'
    Route::get('/articles', function() {
        return '<h1>Halaman Kelola Artikel (Admin & Writer)</h1>';
    })->middleware('role:admin|writer')->name('articles.index');
});

require __DIR__.'/auth.php';
