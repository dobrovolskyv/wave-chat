<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('posts', [PostController::class, 'index'])->name('posts.index');