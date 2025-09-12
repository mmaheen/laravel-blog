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

Route::get('/photo/{id}', [PhotoController::class, 'show'])->name('photo.show');
