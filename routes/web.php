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

/* ======= Module 1 Routes ======= */

// Route::get('/module1', function () {
//     return view('module1.index');
// })->name('module1.index');

Route::get('/module1/index', function () {
    return view('module1.index');
})->name('module1.index');

Route::get('/module1/mcq1', function () {
    return view('module1.one');
})->name('module1.one');

Route::get('/module1/mcq2', function () {
    return view('module1.two');
})->name('module1.two');

Route::get('/module1/mcq3', function () {
    return view('module1.three');
})->name('module1.three');

Route::get('/module1/mcq4', function () {
    return view('module1.four');
})->name('module1.four');

Route::get('/module1/thank-you', function () {
    return view('module1.thankyou');
})->name('module1.thankyou');

/* ======= Module 2 Routes (Newly Added) ======= */

Route::get('/module2/index', function () {
    return view('module2.index');
})->name('module2.index');

Route::get('/module2/mcq1', function () {
    return view('module2.one');
})->name('module2.one');

Route::get('/module2/mcq2', function () {
    return view('module2.two');
})->name('module2.two');

Route::get('/module2/mcq3', function () {
    return view('module2.three');
})->name('module2.three');

Route::get('/module2/mcq4', function () {
    return view('module2.four');
})->name('module2.four');

Route::get('/module2/thank-you', function () {
    return view('module2.thankyou');
})->name('module2.thankyou');

/* ======= Module 3 Routes (Newly Added) ======= */

Route::get('/module3/index', function () {
    return view('module3.index');
})->name('module3.index');

Route::get('/module3/mcq1', function () {
    return view('module3.one');
})->name('module3.one');

Route::get('/module3/mcq2', function () {
    return view('module3.two');
})->name('module3.two');

Route::get('/module3/mcq3', function () {
    return view('module3.three');
})->name('module3.three');

Route::get('/module3/mcq4', function () {
    return view('module3.four');
})->name('module3.four');

Route::get('/module3/thank-you', function () {
    return view('module3.thankyou');
})->name('module3.thankyou');
