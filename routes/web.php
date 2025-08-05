<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::resources([
    'categories' => \App\Http\Controllers\Frontend\CategoryController::class,
]);
