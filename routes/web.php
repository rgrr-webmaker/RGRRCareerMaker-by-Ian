<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Unauthorized access page
    Route::get('/unauthorized', [ErrorController::class, 'unauthorized'])->name('unauthorized');

    // Shared routes (accessible by both students and employers)
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::get('/applications/{application}/resume', [ApplicationController::class, 'downloadResume'])->name('applications.resume');

    // Student routes
    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
        Route::put('/profile', [StudentController::class, 'updateProfile'])->name('profile.update');
        Route::get('/jobs', [StudentController::class, 'jobs'])->name('jobs.index');
        Route::get('/jobs/{job}', [StudentController::class, 'showJob'])->name('jobs.show');
        Route::get('/applications', [StudentController::class, 'applications'])->name('applications.index');
        Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('jobs.apply');
        Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    });

    // Employer routes
    Route::middleware('role:employer')->prefix('employer')->name('employer.')->group(function () {
        Route::get('/dashboard', [EmployerController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [EmployerController::class, 'profile'])->name('profile');
        Route::put('/profile', [EmployerController::class, 'updateProfile'])->name('profile.update');
        Route::get('/applicants', [EmployerController::class, 'applicants'])->name('applicants.index');

        Route::resource('jobs', JobController::class);
        Route::post('/jobs/{job}/toggle-status', [JobController::class, 'toggleStatus'])->name('jobs.toggle-status');
        Route::put('/applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.update-status');
    });
});
