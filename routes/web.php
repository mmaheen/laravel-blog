<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::resources([
    'category' => \App\Http\Controllers\Frontend\CategoryController::class,
    'blog' => \App\Http\Controllers\Frontend\BlogController::class,
    'photo' => \App\Http\Controllers\Frontend\PhotoController::class,
]);
