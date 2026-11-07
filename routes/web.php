<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    try {
        $mahasiswa = Mahasiswa::first();
    } catch (\Throwable $e) {
        $mahasiswa = null;
    }
    return view('page.home', compact('mahasiswa'));
})->name('home');

Route::get('/profile', [MahasiswaController::class, 'index'])->name('profile');

Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/about', function () {
    return view('page.about');
})->name('about');

Route::get('/contact', function () {
    try {
        $mahasiswa = Mahasiswa::first();
    } catch (\Throwable $e) {
        $mahasiswa = null;
    }
    return view('page.contact', compact('mahasiswa'));
})->name('contact');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::match(['get', 'post'], '/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Alias for Laravel's default 'login' route name to avoid issues with standard redirects
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');

/*
|--------------------------------------------------------------------------
| Protected Admin Routes (Requires Authentication)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    // CRUD Project
    Route::resource('project', AdminProjectController::class);
});
