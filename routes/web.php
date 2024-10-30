<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {return view('welcome');})->name('welcome');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [ModuleController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
});

// Route::resource('modules', ModuleController::class);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admin/modules', ModuleController::class);
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::get('/modules/{id}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('/modules/{id}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/modules/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy');

});

Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
Route::get('/modules/{id}', [ModuleController::class, 'show'])->name('modules.show');
Route::get('/modules/search', [ModuleController::class, 'search'])->name('modules.search');

