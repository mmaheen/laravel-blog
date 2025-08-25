<?php

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
Route::get('register', [\App\Http\Controllers\Sanctum\RegisterController::class, 'register'])
    ->name('sanctum.register')
    ->middleware('guest');
Route::post('register', [\App\Http\Controllers\Sanctum\RegisterController::class, 'store'])
    ->name('sanctum.register');
Route::get('login', [\App\Http\Controllers\Sanctum\LoginController::class, 'login'])
    ->name('sanctum.login')
    ->middleware('guest'); //RedirectIfAuthenticated class
Route::post('login', [\App\Http\Controllers\Sanctum\LoginController::class, 'store'])
    ->name('sanctum.login');
Route::post('logout', [\App\Http\Controllers\Sanctum\LoginController::class, 'logout'])
    ->name('sanctum.logout')
    ->middleware('auth');

//Dashboard
Route::get('dashboard', [\App\Http\Controllers\Backend\Client\DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');