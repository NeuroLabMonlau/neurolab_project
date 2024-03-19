<?php

// use App\Http\Middleware\isAdmin;
// use App\Http\Middleware\isStudent;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    // admin routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/dashboard/users', [UserController::class, 'index'])->name('users');
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        
    });

    // student routes
    Route::middleware('student')->prefix('student')->group(function () {
        Route::view('/dashboard', 'student.dashboard')->name('dashboard');
    });

    // teacher routes
    Route::middleware('teacher')->prefix('teacher')->group(function () {
        Route::view('/dashboard', 'teacher.dashboard')->name('dashboard');
    });

    // tutor routes

    Route::middleware('tutor')->prefix('tutor')->group(function () {
        Route::view('/dashboard', 'tutor.dashboard')->name('dashboard');
    });

    // psychologist routes
    Route::middleware('psychologist')->prefix('psychologist')->group(function () {
        Route::view('/dashboard', 'psychologist.dashboard')->name('dashboard');
    });
    
});


