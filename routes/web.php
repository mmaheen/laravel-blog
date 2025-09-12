<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PhotoController;

//Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blog Routes Frontend
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('blogs-by-date/{date}', [BlogController::class, 'blogsByDate'])->name('blogs.by.date');
Route::get('blogs-by-author/{author}', [BlogController::class, 'blogsByAuthor'])->name('blogs.by.author');
Route::get('blogs-by-category/{category}', [BlogController::class, 'blogsByCategory'])->name('blogs.by.category');
Route::get('blogs-by-tag/{tag}', [BlogController::class, 'blogsByTag'])->name('blogs.by.tag');

Route::get('/photo/{id}', [PhotoController::class, 'show'])->name('photo.show');

// Auth Routes
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/login', [HomeController::class, 'login'])->name('login');
