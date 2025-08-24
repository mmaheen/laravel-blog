<?php

use App\Http\Controllers\Sanctum\LoginController;
use App\Http\Controllers\Sanctum\RegisterController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])
    ->name('home');

Route::resources([
    'category' => \App\Http\Controllers\Frontend\CategoryController::class,
    'blog' => \App\Http\Controllers\Frontend\BlogController::class,
    'photo' => \App\Http\Controllers\Frontend\PhotoController::class,
]);

Route::get('tag/{slug}', [\App\Http\Controllers\Frontend\TagController::class, 'show'])
    ->name('tag.show');

//Sanctum Authentication
Route::get('register', [RegisterController::class, 'register'])
    ->name('sanctum.register');
Route::post('register', [RegisterController::class, 'store'])
    ->name('sanctum.register');
Route::get('login', [LoginController::class, 'login'])
    ->name('sanctum.login');