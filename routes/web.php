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
        Route::view('/dashboard/neurocrib', 'admin.neurocrib.index')->name('neurocrib');
        Route::view('/dashboard/seguimiento', 'admin.seguimiento.index')->name('seguimiento');
        Route::view('/dashboard/users', 'admin.users.index')->name('admin.users.index');
        Route::view('/dashboard/students', 'admin.students.index')->name('admin.students.index');
        Route::view('/dashboard/teachers', 'admin.teachers.index')->name('admin.teachers.index');
        Route::view('/dashboard/tutors', 'admin.tutors.index')->name('admin.tutors.index');
        Route::view('/dashboard/sop', 'admin.sop.index')->name('admin.sop.index');
        Route::view('/dashboard/plans', 'admin.plans.index')->name('admin.plans.index');
    });



    // student routes
    Route::middleware('student')->prefix('student')->group(function () {
        Route::view('/dashboard', 'web.sections.student.index')->name('student.dashboard');
        Route::view('/dashboard/chat', 'web.sections.student.chat')->name('student.chat');
        Route::view('/dashboard/calendar', 'web.sections.student.calendar')->name('student.calendar');
        Route::view('/dashboard/profile', 'web.sections.student.profile')->name('student.profile');
    });

    // teacher routes
    Route::middleware('teacher')->prefix('teacher')->group(function () {
        Route::view('/dashboard', 'web.sections.teacher.index')->name('teacher.dashboard');
    });

    // tutor routes

    Route::middleware('tutor')->prefix('tutor')->group(function () {
        Route::view('/dashboard', 'web.sections.tutor.index')->name('tutor.dashboard');
        Route::view('/dashboard/children', 'web.sections.tutor.children')->name('tutor.children');
    });

    // psychologist routes
    Route::middleware('psychologist')->prefix('psychologist')->group(function () {
        Route::view('/dashboard', 'psychologist.dashboard')->name('dashboard');
    });
    
});


