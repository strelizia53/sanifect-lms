<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// those routes lol

Route::get('/quiz', function () {
    return view('showcase.index');
})->name('quiz.index');
Route::get('/quiz/mcq1', function () {
    return view('showcase.mcqone');
})->name('quiz.mcq1');
Route::get('/quiz/mcq2', function () {
    return view('showcase.mcqtwo');
})->name('quiz.mcq2');
Route::get('/quiz/mcq3', function () {
    return view('showcase.mcqthree');
})->name('quiz.mcq3');
Route::get('/quiz/mcq4', function () {
    return view('showcase.mcqfour');
})->name('quiz.mcq4');
Route::get('/quiz/ddone', function () {
    return view('showcase.ddone');
})->name('quiz.ddone');
Route::get('/quiz/ddtwo', function () {
    return view('showcase.ddtwo');
})->name('quiz.ddtwo');
Route::get('/quiz/thank-you', function () {
    return view('showcase.thankyou');
})->name('showcase.thankyou');
