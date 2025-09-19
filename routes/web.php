<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PhotoController;
use App\Http\Controllers\Backend\DashboardController;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blog Routes Frontend
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('blogs-by-date/{date}', [BlogController::class, 'blogsByDate'])->name('blogs.by.date');
Route::get('blogs-by-author/{author}', [BlogController::class, 'blogsByAuthor'])->name('blogs.by.author');
Route::get('blogs-by-category/{category}', [BlogController::class, 'blogsByCategory'])->name('blogs.by.category');
Route::get('blogs-by-tag/{tag}', [BlogController::class, 'blogsByTag'])->name('blogs.by.tag');

// Photo Routes Frontend
Route::get('/photo/{id}', [PhotoController::class, 'show'])->name('photo.show');

// Auth Routes
Route::middleware(['guest'])->group(function () {
    //Registration routes
    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    //Login routes
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

//Dashboard Routes
Route::prefix('/dashboard')->middleware('auth')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('index');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::resources([
        'blogs' => \App\Http\Controllers\Backend\BlogController::class,
        'photos' => \App\Http\Controllers\Backend\PhotoController::class,
    ]);
});
