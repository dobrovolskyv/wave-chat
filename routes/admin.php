<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () { 
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
});