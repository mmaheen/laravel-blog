<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::resources([
    'category' => \App\Http\Controllers\Frontend\CategoryController::class,
    'blog' => \App\Http\Controllers\Frontend\BlogController::class,
    'photo' => \App\Http\Controllers\Frontend\PhotoController::class,
]);

Route::get('tag/{slug}', [\App\Http\Controllers\Frontend\TagController::class, 'show'])->name('tag.show');
