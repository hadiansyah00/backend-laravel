<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PageSectionController;

// 1. Route Homepage (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Route Statis Khusus (About, Contact, dll)
Route::get('/tentang-kami', [PagesController::class, 'about'])->name('about');
Route::get('/kontak', [PagesController::class, 'contact'])->name('contact');

// 3. Auth Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 4. Dynamic Pages (should come after static routes)
Route::get('/{slug}', [PagesController::class, 'show'])
    ->where('slug', '^(?!admin|login|register|dashboard|tentang-kami|kontak).*$')
    ->name('pages.show');

// 5. Admin Routes Group
Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource Routes
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('pages', PagesController::class);
    
    // Page Sections with custom parameters
    Route::resource('pages.sections', PageSectionController::class)
        ->parameters(['pages' => 'page:slug'])
        ->shallow()
        ->names([
            'index' => 'pages.sections.index',
            'create' => 'pages.sections.create',
            'store' => 'pages.sections.store',
            'show' => 'sections.show',
            'edit' => 'sections.edit',
            'update' => 'sections.update',
            'destroy' => 'sections.destroy',
        ]);

    // Permissions with custom route
    Route::post('permissions/store-multiple', [PermissionController::class, 'storeMultiple'])
        ->name('permissions.storeMultiple');
    Route::resource('permissions', PermissionController::class)->except('show');

    // Special permission routes
    Route::get('/publish', function() {
        return '<h1>Halaman Publikasi Artikel (Hanya Publisher)</h1>';
    })->middleware('permission:publish articles')->name('publish');

    Route::get('/articles', function() {
        return '<h1>Halaman Kelola Artikel (Admin & Writer)</h1>';
    })->middleware('role:admin|writer')->name('articles.index');
});

require __DIR__.'/auth.php';