<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PhotoController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Blog routes
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('blogs-by-date/{date}', [BlogController::class, 'blogsByDate'])->name('blogs.by.date');
Route::get('blogs-by-author/{author}', [BlogController::class, 'blogsByAuthor'])->name('blogs.by.author');
Route::get('blogs-by-category/{category}', [BlogController::class, 'blogsByCategory'])->name('blogs.by.category');

// Photo routes
Route::get('photo/{slug}', [PhotoController::class, 'show'])->name('photo.show');