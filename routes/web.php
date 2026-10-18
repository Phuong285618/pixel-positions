<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Jobs listings
Route::get('/', [JobController::class, 'index']);
Route::get('/jobs', [JobController::class, 'index']);

// Authenticated job routes (with policy-based authorization like learning-larravel)
Route::middleware('auth')->group(function () {
    Route::get('/jobs/create', [JobController::class, 'create']);
    Route::post('/jobs', [JobController::class, 'store']);

    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
        ->can('edit', 'job');

    Route::patch('/jobs/{job}', [JobController::class, 'update'])
        ->can('edit', 'job');

    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
        ->can('edit', 'job');
});

// Public job routes
Route::get('/jobs/{job}', [JobController::class, 'show']);

// Single action pages
Route::get('/salaries', SalaryController::class);
Route::get('/companies', CompanyController::class);

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

// Guest auth routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});

// Logout (supports both POST and DELETE for maximum compatibility)
Route::match(['post', 'delete'], '/logout', [SessionController::class, 'destroy'])
    ->middleware('auth');
