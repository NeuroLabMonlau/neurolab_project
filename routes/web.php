<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isStudent;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
//     // Route::get('/dashboard', [IndexController::class, 'index'])->name('index.dashboard');
//     // Route::get('/dashboard', function () {
//     //     return view('dashboard');
//     // })->name('dashboard');

// });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::middleware(isAdmin::class)->prefix('admin')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    });

    Route::middleware(isStudent::class)->prefix('student')->group(function () {
        Route::view('/dashboard', 'student.dashboard')->name('dashboard');
    });
    
});


